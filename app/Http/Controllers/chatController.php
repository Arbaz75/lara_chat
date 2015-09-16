<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class chatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public $json = '';
    public function index(Request $request, $id)
    {
    
        switch($id):
        case 'new':
            $msg = $request->input('msg');
            $myid =session('user')->email;
            $fid = session()->get('fid');
            if(empty($msg)){
                $json = array('status' => 0, 'msg'=> 'Enter your message!.');
            }else{
                $id = DB::table('msg')->insertGetId(['to'=>$fid, 'from'=>$myid, 'msg'=>$msg, 'status'=>1 ]);
                if($id){
                    $result = DB::table('msg')->where('id', $id)->first();
                    $json = array('status' => 1, 'msg' => $result->msg, 'lid' => $id, 'time' => $result->time);

                    
                }else{
                    $json = array('status' => 0, 'msg'=> 'Unable to process request.');
                }

             }
        break;
        case 'msg':
            $myid =session('user')->email;
            $fid = session()->get('fid');
            $lid = $request->input('lid');
            if(empty($myid)){

            }else{
        
                $qur = DB::select("select * from msg where `to`='$myid' && `from`='$fid' && `status`=1");
                if($qur){
                    $json = array('status' => 1);
                }else{
                    $json = array('status' => 0);
                }
            }
        break;
        case 'NewMsg':
            $myid =session('user')->email;
            $fid = session()->get('fid');
            $qu = DB::table('msg')->where('to',$myid)->where('status', 1)->where('from',$fid)->orderBy('id', 'desc')->first();
            $json = array('status' => 1, 'msg' => '<div>'.$qu->msg.'</div>', 'time'=> $qu->time, 'from'=>$qu->from, 'lid'=> $qu->id);
            $up = DB::table('msg')->where('to',$myid)->where('from',$fid)->update(['status'=>0]);
          
        break;
        endswitch;
    
    return response()->json($json);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
}
