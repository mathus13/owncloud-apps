<?php
/**
 * @author Frank de Lange
 * @copyright 2017 Frank de Lange
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_Reader\Controller;

use OCP\IRequest;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;


use OCA\Files_Reader\Service\BookmarkService;

error_log("in bookmarkcontroller");

class BookmarkController extends Controller {

    private $bookmarkService;

	/**
	 * @param string $AppName
	 * @param IRequest $request
     * @param BookmarkService $bookmarkService
	 */
    public function __construct($AppName,
                                IRequest $request,
                                BookmarkService $bookmarkService ) {

        parent::__construct($AppName, $request);
        $this->bookmarkService = $bookmarkService;
    }

	/**
     * @brief return bookmark
     *
     * @NoAdminRequired
     * @NoCSRFRequired
     *
     * @param int $fileId
     * @param string $name
     *
	 * @return array|\OCP\AppFramework\Http\JSONResponse
	 */
    public function get($fileId, $name) {
        return $this->bookmarkService->get($fileId, $name);
    }

	/**
     * @brief write bookmark
     *
     * @NoAdminRequired
     * @NoCSRFRequired
     *
     * @param int $fileId
     * @param string $name
     * @param string $value
     *
	 * @return array|\OCP\AppFramework\Http\JSONResponse
	 */
    public function set($fileId, $name, $value) {
        return $this->bookmarkService->set($fileId, $name, $value);
	}


	/**
     * @brief return cursor for $fileId
     *
     * @NoAdminRequired
     * @NoCSRFRequired
     *
     * @param int $fileId 
     *
	 * @return array|\OCP\AppFramework\Http\JSONResponse
	 */
    public function getCursor($fileId) {
        return $this->bookmarkService->getCursor($fileId);
    }

	/**
     * @brief write cursor for $fileId
     *
     * @NoAdminRequired
     * @NoCSRFRequired
     *
     * @param int $fileId
     * @param string $value
     *
	 * @return array|\OCP\AppFramework\Http\JSONResponse
	 */
    public function setCursor($fileId, $value) {
        error_log("in setCursor");
        return $this->bookmarkService->setCursor($fileId, $value);
	}
}
