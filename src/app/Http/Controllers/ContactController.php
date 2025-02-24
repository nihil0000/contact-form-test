<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    // input contact
    public function index()
    {
        $categories = Category::pluck('content', 'id');

        return view('index', compact('categories'));
    }

    // confirm contact content
    public function confirm(ContactRequest $request)
    {
        $contacts = $request->all();

        return view('confirm', compact('contacts'));
    }

    // edit contact content
    public function edit(Request $request)
    {
        return redirect()->route('index')->withInput();
    }

    // store contact content
    public function store(Request $request)
    {
        $contacts = $request->all();

        // Format telephone number as 'xxx-xxxx-xxxx'
        $contacts['tel'] = $contacts['tel_area_code'] . '-' . $contacts['tel_city_code'] . '-' . $contacts['tel_subscriber'];

        Contact::create($contacts);

        return view('thanks');
    }

    // search contact content
    public function search(Request $request)
    {
        $categories = Category::pluck('content', 'id');

        // 検索クエリを適用
        $contacts = Contact::query()
            ->searchByNameOrEmail($request->name_email)
            ->filterByGender($request->gender)
            ->filterByCategory($request->contact_type)
            ->filterByDate($request->contact_date)
            ->paginate(7);

        return view('admin', compact('contacts', 'categories'));
    }

    // delete contact content
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect(route('admin'));
    }

    // export contact content
    public function export(Request $request)
    {
        // 検索条件を適用
        $contacts = Contact::query()
            ->searchByNameOrEmail($request->name_email)
            ->filterByGender($request->gender)
            ->filterByCategory($request->contact_type)
            ->filterByDate($request->contact_date)
            ->get(); // 全件取得

        // CSVヘッダー
        $csvHeader = [
            'お名前', '性別', 'メールアドレス', '電話番号', '住所', '建物名', 'お問い合わせの種類', 'お問い合わせの内容'
        ];

        // データ行を作成
        $csvData = $contacts->map(function ($contact) {
            return [
                $contact->last_name . ' ' . $contact->first_name,
                $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他'),
                $contact->email,
                $contact->tel,
                $contact->address,
                $contact->building,
                $contact->category->content, // カテゴリ名
                $contact->detail,
            ];
        });

        // CSVを作成
        $filename = 'contacts_export_' . now()->format('Ymd_His') . '.csv';
        $handle = fopen('php://output', 'w');
        ob_start();

        // ヘッダーを書き込み
        fputcsv($handle, $csvHeader);

        // データを書き込み
        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }

        fclose($handle);
        $csv = ob_get_clean();

        return Response::make($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
        ]);
    }
}
