<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Inquiry;
use App\Models\Items;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function Index()
    {
        return view('admin.inquiry.index', [
            'inquiries' => Inquiry::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function destroy(Inquiry $id)
    {
        try {
            $id->delete();
            return redirect()->route('inquiries')->with('success', 'Delete successfully!');
        } catch (ModelNotFoundException  $e) {
            return redirect()->route('inquiries')->with('error', 'Record not found.');
        }
    }

    public function update(Inquiry $inquiries)
    {

        $inquiries->status = request()->get('status');
        $inquiries->save();
        return redirect()->route('inquiries');
    }

}
