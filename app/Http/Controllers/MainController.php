<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\Exports\UsersExport;
use App\Models\Article;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller
{
    private $_pages = 'articles.';


    public function mainPage()
    {
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $usersChart = new UserChart();
        $usersChart->displaylegend(false); // responsible for showing dataset title for the chart
//        $usersChart->minimalist(true); // responsible for showing x and y axis of bar
        $usersChart->labels(['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun']);
        $usersChart->dataset('User Registrations', 'bar', [10, 25, 13, 15, 6, 65, 14])
            ->color($borderColors)
            ->backgroundcolor($fillColors);

        $dataUser = User::get();

        return view('welcome', ['usersChart' => $usersChart, 'dataUser' => $dataUser]);
//        return view('welcome');
    }

    public function article()
    {
        return view($this->_pages . 'index');
    }

    public function addArticle()
    {
        return view($this->_pages . 'create');
    }

    public function editArticle($id)
    {
        // $data=Article::where('id',$id)->first();
        return view($this->_pages . 'edit');
    }

    public function exportExcel(Request $request)
    {
        $data = '5';
        return Excel::download(new UsersExport($data), 'users.xlsx');
    }
}
