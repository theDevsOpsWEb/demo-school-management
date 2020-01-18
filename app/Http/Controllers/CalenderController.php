<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $strwidgetTags = '';
        $strwidgetTags .="<li style='list-style: none;'><a href=\"#\"><img src=\"/images/calendar.png\"><strong>".date("F jS, Y", strtotime(date('Y-m-d h:m:s')))."</strong></a></li>";
        $strwidgetTags .="</ul>";
        $strwidgetTags .="</div>";

        $days_count = date('t');
        $current_day = date('d');
        $week_day_first = date('N', mktime(0, 0, 0, date('m'), 1, date('Y')));

        $strwidgetTags .= "<table class=\"calender\"  style='padding: 5px;min-height: 80px;'>";
        $strwidgetTags .= "<tr>";
        $strwidgetTags .= "<th>MO</th>";
        $strwidgetTags .= "<th>TU</th>";
        $strwidgetTags .= "<th>WE</th>";
        $strwidgetTags .= "<th>TH</th>";
        $strwidgetTags .= "<th>FR</th>";
        $strwidgetTags .= "<th style=\"color: #da7676;\">SA</th>";
        $strwidgetTags .= "<th style=\"color: #da7676;\">SU</th>";
        $strwidgetTags .= "</tr>";

        for ($w = 1 - $week_day_first + 1; $w <= $days_count; $w = $w + 7):

                    $strwidgetTags .= "<tr>";
                        $counter = 0;

                        for ($d = $w; $d <= $w + 6; $d++):

                            $date_weeknd = ($counter > 4) ? "color: #da7676;" : "";
                            $cur_date    = ($current_day == $d) ? "background-color:#da7676; color:#fff;font-weight:bold;" : "";

                            $strwidgetTags .= "<td style=\"{$date_weeknd}{$cur_date}font-weight:bold;\">";
                            $strwidgetTags .= ($d > 0 ? ($d > $days_count ? '' : $d) : '') ;
                            $strwidgetTags .= "</td>";
                            $counter++;

                        endfor;
                    $strwidgetTags .= "</tr>";
                endfor;
        $strwidgetTags .= "</table>";
        return view('learning-resource.index', compact('strwidgetTags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
