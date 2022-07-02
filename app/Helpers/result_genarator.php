<?php
if (!function_exists('insert_result_seeder')) {
    function insert_result_seeder($result_sheet, $session, $semester, $model)
    {
        $model->truncate();
        pass_result_seeder($result_sheet, $session, $semester, $model);
        failed_result_seeder($result_sheet, $session, $semester, $model);
    }
}

if (!function_exists('failed_result_seeder')) {
    function pass_result_seeder($result_sheet, $session, $semester, $model)
    {
        $pattern = "/\d{1,6}\s\((?<=\d\s\()\d\.\d+/s";
        // check if the pattern is matched
        preg_match_all($pattern, $result_sheet, $result);
        // foreach $result[0] as $value
        foreach ($result[0] as $value) {
            $point = trim(explode("(", $value)[1]);
            $model->create([
                'roll' => trim(explode(" ", $value)[0]),
                'point' =>  $point,
                'grade' => grade_seeder($point),
                'session' => $session,
                'semester' => $semester,
            ]);
        }
    }
}

if (!function_exists('failed_result_seeder')) {
    function failed_result_seeder($result_sheet, $session, $semester, $model)
    {
        $pattern = "/\d{1,6}\s\{(?<=\d\s\{).+?(?=\})/s";
        // check if the pattern is matched
        preg_match_all($pattern, $result_sheet, $result);
        // foreach $result[0] as $value
        foreach ($result[0] as $value) {
            $extra_word_remove = "/\d{1,5}\(.+?\)|\d{1,5}\s\(.+?\)/s";
            preg_match_all($extra_word_remove, $value, $subject);
            // dd(implode(",", $subject[0]));
            // dd($subject);
            $model->create([
                'roll' => trim(explode(" ", $value)[0]),
                'failed_subjects' => implode(",", $subject[0]),
                'session' => $session,
                'semester' => $semester,
            ]);
        }
    }
}

if (!function_exists('grade_seeder')) {
    function grade_seeder($point)
    {
        $point = floatval($point);

        if ($point >= 4.00) {
            return 'A+';
        } elseif ($point >= 3.75) {
            return 'A';
        } elseif ($point >= 3.50) {
            return 'A-';
        } elseif ($point >= 3.25) {
            return 'B+';
        } elseif ($point >= 3.00) {
            return 'B';
        } elseif ($point >= 2.75) {
            return 'B-';
        } elseif ($point >= 2.50) {
            return 'C+';
        } elseif ($point >= 2.25) {
            return 'C';
        } elseif ($point >= 2.00) {
            return 'D';
        }
        return 'F';
    }
}
