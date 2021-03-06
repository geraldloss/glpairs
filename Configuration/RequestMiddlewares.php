<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2019 Gerald Loß <gerald.loss@gmx.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
 return [
    'frontend' => [
        'Loss/Glpairs/ajax' => [
            'target' => \Loss\Glpairs\Middleware\GlpairsMiddleware::class,
            'after' => [
                // after TypoScriptFrontendController->fe_user is created
                'typo3/cms-frontend/authentication'
            ],
//             'before' => [
//                 // but before all the other middlewares
//                 'typo3/cms-frontend/backend-user-authentication'
//             ],
        ],
    ]
];