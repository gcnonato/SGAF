<?php

namespace Posprint\Printers;

/**
 * Star class for POS printer
 * Model: BSC-10
 *
 * @category   NFePHP
 * @package    Posprint
 * @copyright  Copyright (c) 2016
 * @license    http://www.gnu.org/licenses/lesser.html LGPL v3
 * @author     Roberto L. Machado <linux.rlm at gmail dot com>
 * @link       http://github.com/nfephp-org/posprint for the canonical source repository
 */

use Posprint\Printers\DefaultPrinter;
use Posprint\Printers\PrinterInterface;

final class Star extends DefaultPrinter implements PrinterInterface
{
    /**
     * Select printer mode
     *
     * @param string $mode
     */
    public function setPrintMode($mode = null)
    {
        //not used for this printer
    }
}
