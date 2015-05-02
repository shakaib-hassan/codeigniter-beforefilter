<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 *
 * @author shinn
 */
class MY_Controller extends CI_Controller {

    public function __construct($filter = NULL) {
        parent::__construct();

        self::before_filter($filter);
    }

    function before_filter($filter) {

        $current_controller = $this->router->class;

        $class_methods = get_class_methods($current_controller);

        if (is_array($filter) && count($filter) > 0) {

            // it means user want only filter on the passed array
            foreach ($filter as $value) {
                // check if the method exist
                if (in_array($value, $class_methods)) {
                    if ($this->router->method == $value) {
                        // apply the logic like logged in user can do this and that.
                        show_error("was in if condition with method name as $value", 500);
                    }
                } else {

                    show_error("$value method do not exist for the controller $current_controller", 500);
                }
            }
        } else {

            foreach ($class_methods as $method_name) {
                if ($method_name != "__construct" && lcfirst($method_name) != $current_controller) {
                    // perform the logic like logged in user can do this and that.
                    show_error("was in else condition with method name as $method_name", 500);
                }
            }
        }
    }

}
