<?php

/**
 * LibreNMS Tickets Controller
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */

namespace DRP\Tickets\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;
use DRP\Tickets\Tickets;
use DRP\Tickets\TraitHidePrivates;


/**
 * LibreNMS Tickets Controller
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */
class TicketController extends Controller {
    use TraitHidePrivates;

    private array $info;

    public function __construct() {
        $this->info = Tickets::getInfo();
    }

    public function index(): View {

        return view('librenms-tickets::page')->with('error', 'Your custom error message goes here.');
    }

    public function create(): View {
        return view('librenms-tickets::upload', ['info' => $this->info]);
    }

    public function settings(): View {

        return view('librenms-tickets::settings', ['info' => $this->info]);
    }
}
