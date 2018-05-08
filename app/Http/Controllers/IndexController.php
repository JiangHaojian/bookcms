<?php

namespace App\Http\Controllers;

use App\Book;
use App\Loan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index(){
        //顶部四个图标数字的统计
        $usercount = User::count();
        $bookcount = Book::count();
        $loancount = Loan::count();

        $time = time();
        $year = date('Y',$time);
        $month = date('m',$time);
        $day = date('d',$time);
        $starttoday = mktime(0,0,0,$month,$day,$year);
        $endtoday = mktime(23,59,59,$month,$day,$year);
        $newbookcount = Book::select('created_at')
            ->havingRaw('UNIX_TIMESTAMP(created_at) > '.$starttoday)
            ->havingRaw('UNIX_TIMESTAMP(created_at) < '.$endtoday)
            ->groupBy('created_at')
            ->count();
        $count = [$usercount,$bookcount,$loancount,$newbookcount];

        //书籍数量统计
        $allbook = Book::all();
        $stockcount = 0;
        foreach ($allbook as $book) {
            $stockcount = $stockcount + $book->stock;
        }
        $allloan = Loan::all();
        $truestock = $stockcount;
        foreach ($allloan as  $loan){
            $truestock = $truestock - $loan->num;
        }

        $newbookcounts = 0;
        $newbook = Book::select('created_at','stock')
            ->havingRaw('UNIX_TIMESTAMP(created_at) > '.$starttoday)
            ->havingRaw('UNIX_TIMESTAMP(created_at) < '.$endtoday)
            ->groupBy('created_at','stock')->get();
        foreach ($newbook as $book){
            $newbookcounts = $newbookcounts + $book->stock;
        }
        $bookcounts = [$stockcount,$truestock,$newbookcounts];

        //用户数量统计
        $newusercount = User::select('created_at')
            ->havingRaw('UNIX_TIMESTAMP(created_at) > '.$starttoday)
            ->havingRaw('UNIX_TIMESTAMP(created_at) < '.$endtoday)
            ->groupBy('created_at')
            ->count();
        $atvusercount = User::select('login_at')
            ->havingRaw('UNIX_TIMESTAMP(login_at) > '.$starttoday)
            ->havingRaw('UNIX_TIMESTAMP(login_at) < '.$endtoday)
            ->groupBy('login_at')
            ->count();
        $users = [$newusercount,$atvusercount];

        //借还数量统计
        $newloans = Loan::select('created_at')
            ->havingRaw('UNIX_TIMESTAMP(created_at) > '.$starttoday)
            ->havingRaw('UNIX_TIMESTAMP(created_at) < '.$endtoday)
            ->groupBy('created_at')
            ->get();
        $newloanscount = $newloans->count();
        $loanusers = Loan::select('uid')->groupby('uid')->get();
        $loanuserscount = $loanusers->count();
        $loancounts = [$newloanscount,$loanuserscount];

        //借出信息
        $loans = Loan::join('users','uid','=','users.id')
            ->select('name','loans.created_at','num')
            ->havingRaw('UNIX_TIMESTAMP(`'.config('database.connections.mysql.prefix').'loans`.`created_at`) > '.$starttoday)
            ->groupBy('loans.created_at','name','num')->get();

        //低库存书籍统计
        $lowstockcount = Book::where('stock','<','5')->count();
        session(['infonum' => $lowstockcount]);

        return view('index')->with('count',$count)->with('bookcounts',$bookcounts)->with('users',$users)->with('loancounts',$loancounts)->with('loans',$loans);
    }
}
