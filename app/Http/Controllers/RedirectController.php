<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function btebResultRedirect()
    {
        return \redirect()->route('bteb-result.show');
    }

    public function portfolioRedirect()
    {
        return redirect()->route('portfolio');
    }
}
