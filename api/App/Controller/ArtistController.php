<?php
    namespace App;

    use Exception;
    use App\ArtistModel;
    use App\Controller;
    use App\RequestMiddleware;

    class ArtistController extends Controller {

        /**
         * fetchArtists
         *
         * Fetches an array of Artists
         *
         * @param mixed $request $response Contains the Request and Respons Object from the router.
         * @return mixed Anonymous
         */
        public function fetchArtists($request, $response)
        {
            $Response = [];

            try {
                $ArtistModel = new ArtistModel();
                $Artists = $ArtistModel::fetchArtists();

                if ($Artists['status']) {
                    $Response['status'] = true;
                    $Response['data'] = $Artists['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }

                $Response['status'] = 500;
                $Response['message'] = 'Sorry, An unexpected error occured and your Artists could be retrieved.';
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
         * fetchArtistById
         *
         * Fetches a Artist by an ID
         *
         * @param mixed $request $response Contains the Request and Respons Object from the router.
         * @return mixed Anonymous
         */
        public function fetchArtistById($request, $response)
        {
            $Response = [];

            $validationObject = array(
                (Object) [
                    'validator' => 'required',
                    'data' => isset($request->id) ? $request->id : '',
                    'key' => 'Artist ID'
                ],
                (Object) [
                    'validator' => 'numeric',
                    'data' => isset($request->id) ? $request->id : '',
                    'key' => 'Artist ID'
                ]
            );
            
            $validationBag = Parent::validation($validationObject);                    
            if ($validationBag->status) {              
                $response->code(400)->json($validationBag);  
                return;
            }

            try {
                $ArtistModel = new ArtistModel();
                $Artist = $ArtistModel::fetchArtistByID($request->id);
                
                if ($Artist['status']) {

                    $Response['status'] = true;
                    $Response['data'] = $Artist['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }
                
                $Response['status'] = 500;
                $Response['message'] = 'Sorry, An unexpected error occured and your Artist could be retrieved.';
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

        /**
         * fetchAlbumsByArtistId
         *
         * Fetches an array of Albums by an Artist ID
         *
         * @param mixed $request $response Contains the Request and Respons Object from the router.
         * @return mixed Anonymous
         */
        public function fetchAlbumsByArtistId($request, $response)
        {
            $Response = [];

            $validationObject = array(
                (Object) [
                    'validator' => 'required',
                    'data' => isset($request->id) ? $request->id : '',
                    'key' => 'Artist ID'
                ],
                (Object) [
                    'validator' => 'numeric',
                    'data' => isset($request->id) ? $request->id : '',
                    'key' => 'Artist ID'
                ]
            );
            
            $validationBag = Parent::validation($validationObject);                    
            if ($validationBag->status) {              
                $response->code(400)->json($validationBag);  
                return;
            }

            try {
                $ArtistModel = new ArtistModel();
                $artist = $ArtistModel::fetchAlbumsByArtistID($request->id);
                
                if ($artist['status']) {

                    $Response['status'] = true;
                    $Response['data'] = $artist['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }
                
                $Response['status'] = 500;
                $Response['message'] = 'Sorry, An unexpected error occured and your Artist Albums could be retrieved.';
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