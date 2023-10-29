<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Kreait\Firebase\Messaging\CloudMessage;

class SendNotificationController extends Controller
{

// public function sendNotificastion()
// {
//     // Inicializa o Firebase
//     $factory = (new Factory)->withServiceAccount(storage_path('app/firebase/serviceAccount.json'));
//     $messaging = $factory->createMessaging();

//     // Tokens de registro dos dispositivos
//     $registrationTokens = ['er_iozWLQG6c--mEcupImg:APA91bEI5-vBxnMSFf9uCoE-gzqWvaghQ3qus3DF3jPbf6gpV4wPvDxHau5GRUPrM8d2WfOLtmJP8B4wACOZgmYVg-4g6CZATWRgT7mW-Avr3Wx77hqXeO-SMcbk6MJrvkZ4W0kFqdYy']; // Adicione todos os tokens necessários aqui

//     // Criando a mensagem
//     $message = CloudMessage::new()
//         ->withNotification([
//             'title' => 'Hello, this is new',
//             'body' => 'Fala comigo meu parceiro',
//         ])
//         ->withData([
//             'this' => 'this is console data',
//             'clickUrl' => 'https://google.com',
//         ]);

//     // Envia a notificação para múltiplos dispositivos
//     $result = $messaging->sendMulticast($message, $registrationTokens);

//     return response()->json($result);
// }
public function sendNotification()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "registration_ids": ["er_iozWLQG6c--mEcupImg:APA91bEI5-vBxnMSFf9uCoE-gzqWvaghQ3qus3DF3jPbf6gpV4wPvDxHau5GRUPrM8d2WfOLtmJP8B4wACOZgmYVg-4g6CZATWRgT7mW-Avr3Wx77hqXeO-SMcbk6MJrvkZ4W0kFqdYy"],
            "notification": {
                "body": "Send me new body",
                "title": "Subscribe",
                "name": "hello"
            },
            "data": {
                "da": "this is console data",
                "clickUrl": "https://google.com"
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: key=AAAAUa1VCS4:APA91bG0H7jdmtPs2vh5pZkzVHruPD25hRO0HzPwVvLQm8xS4AzbnJwxINDX1y8Qh-CbzJiJ5NPhyVmnZzK_xT32tMzUGKA_AffLaMDXYcu-_d6hJkDiiiwGWlG3_pM_HM69tXcVKQyf'
        ),
        CURLOPT_SSL_VERIFYHOST => 0,  // Desativa a verificação SSL (só para depuração!)
        CURLOPT_SSL_VERIFYPEER => 0   // Desativa a verificação SSL (só para depuração!)
    ));

    $response = curl_exec($curl);

    if ($response === false) {
        $error = 'Curl error: ' . curl_error($curl);
        curl_close($curl);
        return response()->json(['error' => $error]);
    }

    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    $responseData = json_decode($response, true);
    $responseData['http_code'] = $httpcode;

    return response()->json($responseData);
}


// app/Http/Controllers/SendNotificationController.php

public function sendTestNotification()
{
    $url = "https://fcm.googleapis.com/fcm/send";
    $headers = [
        'Authorization: key=YOUR_SERVER_KEY',  // Substitua 'YOUR_SERVER_KEY' pela sua chave de servidor FCM
        'Content-Type: application/json'
    ];
    $fields = [
        'registration_ids' => ['YOUR_DEVICE_TOKEN'],  // Substitua 'YOUR_DEVICE_TOKEN' pelo token do seu dispositivo
        'notification' => [
            'title' => 'Your Title',
            'body' => 'Your Body',
        ],
        // ... outros campos necessários
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    $result = curl_exec($ch);

    if ($result === FALSE) {
        die('cURL Error: ' . curl_error($ch));
    }

    curl_close($ch);
    return response()->json(json_decode($result));
}


}
