<?php
/**
 *
 * Class hikesController
 *
 */
class hikesController extends Controller {

	/**
	 * @method getAllHikes()
	 * @desc Method that return all Hikes
	 * @return Hikes
	 */
    public static function getAllHikes() {
        return Hike::get_hikesTypeHike(1);
    } 

    /**
     * @method hikes()
     * @desc Method that controls the page 'hikes.php'
     */
	function hikes() {
		
		// Initialization of variables
		$this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
	}
}
?>