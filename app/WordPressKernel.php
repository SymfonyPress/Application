<?php
/**
 * Copyright (c) 2013 Josiah Truasheim
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category HttpKernel
 * @package  SymfonyPress
 * @author   Josiah <josiah@jjs.id.au>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/SymfonyPress/SymfonyPress
 */

use Symfony\Component\Config\Loader\LoaderInterface;
use SymfonyPress\SymfonyPressKernel;

/**
 * WordPress Kernel
 *
 * This basic kernel should be modified to suit your needs and additional
 * bundles should be added here.
 *
 * @category HttpKernel
 * @package  SymfonyPress
 * @author   Josiah <josiah@jjs.id.au>
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/SymfonyPress/SymfonyPress
 */
class WordPressKernel extends SymfonyPressKernel
{
    /**
     * Returns an array of bundles to register
     * 
     * @return array
     */
    public function registerBundles()
    {
        $bundles = parent::registerBundles();

        return array();
    }

    /**
     * Loads the container configuration
     * 
     * @param LoaderInterface $loader Configuration loader
     * 
     * @return void
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        // $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}