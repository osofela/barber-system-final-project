<?php

/**
 * Created by PhpStorm.
 * User: garyobrien
 * Date: 22/02/2016
 * Time: 09:41
 */

use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Pagination\Paginator;

class ApiController extends BaseController
{

    protected $statusCode = 200;

    /**
     * @return mixed
     */

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respondNotFound($message = 'Not Found!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    public function respond($data, $headers=[])
    {
        return Response::json($data, $this->getStatusCode(),$headers);

    }

    /**
     * @param $lessons
     * @return mixed
     */

    protected function respondWithPagination(Paginator $users, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $users->getTotal(),
                'total_pages' => ceil($users->getTotal() / $users->getPerPage()),
                'current_page' => $users->getCurrentPage(),
                'limit' => $users->getPerPage()
            ]
        ]);

        return $this->respond($data);
    }

    public function respondWithError($message)
    {

        return $this->respond([

            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);

    }

    /**
     * @return mixed
     */
    public function respondCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond([

            'message' => $message
        ]);
    }

}