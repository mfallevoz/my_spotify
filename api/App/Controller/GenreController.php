<?php
    namespace App;

    use Exception;
    use App\GenreModel;
    use App\Controller;
    use App\RequestMiddleware;

    class GenreController extends Controller {

        /**
         * fetchGenres
         *
         * Fetches an array of Genres
         *
         * @param mixed $request $response Contains the Request and Respons Object from the router.
         * @return mixed Anonymous
         */
        public function fetchGenres($request, $response)
        {
            $Response = [];

            try {
                $GenreModel = new GenreModel();
                $Genres = $GenreModel::fetchGenres();

                if ($Genres['status']) {
                    $Response['status'] = true;
                    $Response['data'] = $Genres['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }

                $Response['status'] = 500;
                $Response['message'] = 'Sorry, An unexpected error occured and your Genres could be retrieved.';
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
         * fetchGenreById
         *
         * Fetches a Genre by an ID
         *
         * @param mixed $request $response Contains the Request and Respons Object from the router.
         * @return mixed Anonymous
         */
        public function fetchGenreById($request, $response)
        {
            $Response = [];

            $validationObject = array(
                (Object) [
                    'validator' => 'required',
                    'data' => isset($request->id) ? $request->id : '',
                    'key' => 'Genre ID'
                ],
                (Object) [
                    'validator' => 'numeric',
                    'data' => isset($request->id) ? $request->id : '',
                    'key' => 'Genre ID'
                ]
            );
            
            $validationBag = Parent::validation($validationObject);                    
            if ($validationBag->status) {              
                $response->code(400)->json($validationBag);  
                return;
            }

            try {
                $GenreModel = new GenreModel();
                $Genre = $GenreModel::fetchGenreByID($request->id);
                
                if ($Genre['status']) {

                    $Response['status'] = true;
                    $Response['data'] = $Genre['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }
                
                $Response['status'] = 500;
                $Response['message'] = 'Sorry, An unexpected error occured and your Genre could be retrieved.';
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