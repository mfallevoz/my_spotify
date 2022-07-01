<?php
    namespace App;

    use Exception;
    use App\AlbumModel;
    use App\Controller;
    use App\RequestMiddleware;

    class AlbumController extends Controller {

        /**
         * fetchAlbums
         *
         * Fetches an array of Albums
         *
         * @param mixed $request $response Contains the Request and Respons Object from the router.
         * @return mixed Anonymous
         */
        public function fetchAlbums($request, $response)
        {
            $Response = [];

            try {
                $AlbumModel = new AlbumModel();
                $albums = $AlbumModel::fetchAlbums();

                if ($albums['status']) {
                    $Response['status'] = true;
                    $Response['data'] = $albums['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }

                $Response['status'] = 500;
                $Response['message'] = 'Sorry, An unexpected error occured and your Albums could be retrieved.';
                $Response['data'] = [];
                
                $response->code(500)->json($Response);
                return;
            } catch (Exception $e) {
                $Response['status'] = 500;
                $Response['message'] = $e->getMessage();
                $Response['data'] = [];
                
                $response->code(500)->json($Response);
                return;
            }
            
            return;
        }

        /**
         * fetchAlbumById
         *
         * Fetches a Album by an ID
         *
         * @param mixed $request $response Contains the Request and Respons Object from the router.
         * @return mixed Anonymous
         */
        public function fetchAlbumById($request, $response)
        {
            $Response = [];

            $validationObject = array(
                (Object) [
                    'validator' => 'required',
                    'data' => isset($request->id) ? $request->id : '',
                    'key' => 'Album ID'
                ],
                (Object) [
                    'validator' => 'numeric',
                    'data' => isset($request->id) ? $request->id : '',
                    'key' => 'Album ID'
                ]
            );
            
            $validationBag = Parent::validation($validationObject);                    
            if ($validationBag->status) {              
                $response->code(400)->json($validationBag);  
                return;
            }

            try {
                $AlbumModel = new AlbumModel();
                $album = $AlbumModel::fetchAlbumByID($request->id);
                
                if ($album['status']) {

                    $Response['status'] = true;
                    $Response['data'] = $album['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }
                
                $Response['status'] = 500;
                $Response['message'] = 'Sorry, An unexpected error occured and your Album could be retrieved.';
                $Response['data'] = [];
                
                $response->code(500)->json($Response);
                return;
            } catch (Exception $e) {

                $Response['status'] = 500;
                $Response['message'] = $e->getMessage();
                $Response['data'] = [];
                
                $response->code(500)->json($Response);
                return;
            }
        
        }
    }
?>