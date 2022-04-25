<?php

namespace App\Controllers;

use App\Libraries\Datatables;
use App\Libraries\Systems;
use App\Models\MLanding;
use App\Models\MUsers;
use App\Models\MUtils;
use App\Models\MVideos;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;
use Config\Services;
use Mpdf\Mpdf;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['ssl', 'str', 'url', 'filesystem'];

    /**
     * Constructor.
     */

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        $this->input = Services::request();
        $this->session = Services::session();
        $this->email = Services::email();
        $this->image = Services::image();
        $this->db = Database::connect();

        //Model Load
        $this->users = new MUsers();
        $this->videos = new MVideos();
        $this->utils = new MUtils();
        $this->landing = new MLanding();

        //Libraries
        $this->datatables = new Datatables();
        $this->systems = new Systems();
        $this->mpdf = new Mpdf();
    }

    public function SuccessRespon($msg, $data = [])
    {
        $json = ['status' => 1, 'msg' => $msg, 'data' => $data];
        echo json_encode($json);
        die;
    }
    public function ErrorRespon($msg, $data = [])
    {
        $json = ['status' => 0, 'msg' => $msg, 'data' => $data];
        echo json_encode($json);
        die;
    }
    public function sendOtp($otp, $address)
    {
        $config['protocol'] = 'smtp';
        $config['mailType'] = 'html';
        $config['SMTPTimeout'] = 60;
        $config['SMTPKeepAlive'] = true;
        $config['SMTPCrypto'] = 'ssl';
        $config['SMTPHost'] = 'smtp.googlemail.com';
        $config['SMTPUser'] = 'layhome12@gmail.com';
        $config['SMTPPass'] = 'ilhamnm12345';
        $config['SMTPPort'] = '465';
        $this->email->initialize($config);
        $this->email->setFrom('pudidistreamofficial@gmail.com');
        $this->email->setTo($address);
        $this->email->setSubject('Kode OTP');
        $this->email->setMessage('Hi.. Ini Kode OTP Kamu <b>' . $otp . "</b>\r\n" . 'Jangan Berikan Kode Ini Kesiapapun !');
        if (!$this->email->send()) $this->ErrorRespon('Kode OTP Gagal Dikirim..', ['error' => $this->email->printDebugger()]);
        $this->SuccessRespon('Kode OTP Telah Dikirim..', ['key' => str_encrypt($address)]);
    }
    public function historyUser($log = [])
    {
        $this->utils->historyUser($log);
    }
    public function printPDF($name = '', $html = '', $act = 'D')
    {
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output($name, $act);
    }
}
