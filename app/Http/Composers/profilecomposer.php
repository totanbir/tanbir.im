<?php 
namespace App\Http\Composers;
use Illuminate\View\View;

class profilecomposer
{
	public function compose(View $view)
	{
		$view->with('okz', 'rafi is a good boy');
	}
}
 ?>
