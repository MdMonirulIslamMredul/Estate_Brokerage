<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use Carbon\Carbon;


class CertificateController extends Controller
{
    public function tech_web_all_certificate()
    {
        $certificates = Certificate::latest('id', 'DESC')->get();
        return view('backend.certificate.all_certificate', compact('certificates'));
    } //end method -------------------------------

    public function tech_web_add_certificate()
    {
        return view('backend.certificate.add_certificate');
    } //end method---------------------------------------

    public function tech_web_certificate_store(Request $request)
    {
        if ($request->hasFile('certificate_file')) {
            $file = $request->file('certificate_file');
            $fileName = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/certificate/'), $fileName);
            $save_url = 'public/backend/certificate/' . $fileName; //insert photo into database
        }

        Certificate::insert([
            'title_english' => $request->title_english,
            'title_bangla' => $request->title_bangla,
            'short_des_english' => $request->short_des_english,
            'short_des_bangla' => $request->short_des_bangla,
            'certificate_file' =>  $save_url ?? null,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Certificate inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.certificate')->with($notification);
    } //end method------------------------------

    public function tech_web_edit_certificate($id)
    {
        $edit_certificate = Certificate::findOrFail($id);
        return view('backend.certificate.edit_certificate', compact('edit_certificate'));
    } //end method------------------------------------------

    public function tech_web_certificate_update(Request $request)
    {
        $id = $request->id;
        $certificate_file = Certificate::find($id);
        $del_certificate_file = $certificate_file->certificate_file;

        $data = array();

        if ($request->hasFile('certificate_file')) {
            @unlink($del_certificate_file);
            $file = $request->file('certificate_file');
            $fileName = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/certificate/'), $fileName);
            $data['certificate_file'] = 'public/backend/certificate/' . $fileName; //insert photo into database
        }

        $data['title_english'] = $request->title_english;
        $data['title_bangla'] = $request->title_bangla;
        $data['short_des_english'] = $request->short_des_english;
        $data['short_des_bangla'] = $request->short_des_bangla;
        $data['updated_at'] = Carbon::now();
       
        Certificate::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Certificate Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.certificate')->with($notification);
    } //end method------------------------------

    public function tech_web_certificate_delete($id)
    {
        $pdf_file = Certificate::findOrFail($id);
        @unlink($pdf_file->certificate_file);
        Certificate::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Certificate Deleted Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method---------------------------------

    // Notice status active inactive method start ------------
    public function tec_web_certificate_inactive($id)
    {
        Certificate::findOrFail($id)->update(['status' => '0']);
        return redirect()->back();
    }
    public function tec_web_certificate_active($id)
    {
        Certificate::findOrFail($id)->update(['status' => '1']);
        return redirect()->back();
    }
}
