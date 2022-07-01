<?php
    namespace App;

    use Exception;
    use App\TrackModel;
    use App\Controller;
    use App\RequestMiddleware;

    class TrackController extends Controller {

        /**
         * fetchTracks
         *
         * Fetches an array of Tracks
         *
         * @param mixed $request $response Contains the Request and Respons Object from the router.
         * @return mixed Anonymous
         */
        public function fetchTracks($request, $response)
        {
            $Response = [];

            try {
                $TrackModel = new TrackModel();
                $Tracks = $TrackModel::fetchTracks();

                if ($Tracks['status']) {
                    $Response['status'] = true;
                    $Response['data'] = $Tracks['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }

                $Response['status'] = 500;
                $Response['message'] = 'Sorry, An unexpected error occured and your Tracks could be retrieved.';
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
         * fetchTrackById
         *
         * Fetches a Track by an ID
         *
         * @param mixed $request $response Contains the Request and Respons Object from the router.
         * @return mixed Anonymous
         */
        public function fetchTrackById($request, $response)
        {
            $Response = [];

            $validationObject = array(
                (Object) [
                    'validator' => 'required',
                    'data' => isset($request->id) ? $request->id : '',
                    'key' => 'Track ID'
                ],
                (Object) [
                    'validator' => 'numeric',
                    'data' => isset($request->id) ? $request->id : '',
                    'key' => 'Track ID'
                ]
            );
            
            $validationBag = Parent::validation($validationObject);                    
            if ($validationBag->status) {              
                $response->code(400)->json($validationBag);  
                return;
            }

            try {
                $TrackModel = new TrackModel();
                $Track = $TrackModel::fetchTrackByID($request->id);
                
                if ($Track['status']) {

                    $Response['status'] = true;
                    $Response['data'] = $Track['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }
                
                $Response['status'] = 500;
                $Response['message'] = 'Sorry, An unexpected error occured and your Track could be retrieved.';
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