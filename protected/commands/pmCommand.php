<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class pmCommand extends CConsoleCommand {
    public function run($args) {
        // here we are doing what we need to do
        set_time_limit(0);
        while (true) {
           print "in PM command\n";
           sleep(10);
        }
    }
}
