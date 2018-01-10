<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Storage;
use File;
use \Response;
use App\Agency;
use App\General;
use App\Client;
use App\Reference;
use App\Guarantor;
use App\Visit;
use App\Agreement;
use App\Commentary;
use App\Firm;
use App\Localitation;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function informacionAgencia()
    {
        return view('admin.informacionAgencia');
    }

    public function informacionGeneral()
    {
        return view('admin.informacionGeneral');
    }

    public function informacionCliente()
    {
        return view('admin.informacionCliente');
    }

    public function informacionReferencia()
    {
        return view('admin.informacionReferencia');
    }

    public function informacionAvalista()
    {
        return view('admin.informacionAvalista');
    }

    public function resultadoVisita()
    {
        return view('admin.resultadoVisita');
    }

    public function acuerdoPago()
    {
        return view('admin.acuerdoPago');
    }

    public function comentarioVisita()
    {
        return view('admin.comentarioVisita');
    }

    public function firma()
    {
        return view('admin.firma');
    }

    public function subiendo()
    {
        return view('admin.subiendo');
    }

    public function boton(Request $request)
    {
        $html = "";

        $siguienteInformacionAgencia = null;
        $siguienteInformacionGeneral = null;
        $siguienteInformacionCliente = null;
        $siguienteInformacionReferencia = null;
        $siguienteInformacionAvalista = null;
        $siguienteResultadoVisita = null;
        $siguienteAcuerdoPago = null;
        $siguienteComentarioVisita = null;
        $siguienteFirma = null;

        if($request->session()->get("siguienteInformacionAgencia")){
            $siguienteInformacionAgencia = $request->session()->get("siguienteInformacionAgencia");
        }

        if($request->session()->get("siguienteInformacionGeneral")){
            $siguienteInformacionGeneral = $request->session()->get("siguienteInformacionGeneral");
        }

        if($request->session()->get("siguienteInformacionCliente")){
            $siguienteInformacionCliente = $request->session()->get("siguienteInformacionCliente");
        }

        if($request->session()->get("siguienteInformacionReferencia")){
            $siguienteInformacionReferencia = $request->session()->get("siguienteInformacionReferencia");
        }

        if($request->session()->get("siguienteInformacionAvalista")){
            $siguienteInformacionAvalista = $request->session()->get("siguienteInformacionAvalista");
        }

        if($request->session()->get("siguienteResultadoVisita")){
            $siguienteResultadoVisita = $request->session()->get("siguienteResultadoVisita");
        }

        if($request->session()->get("siguienteAcuerdoPago")){
            $siguienteAcuerdoPago = $request->session()->get("siguienteAcuerdoPago");
        }

        if($request->session()->get("siguienteComentarioVisita")){
            $siguienteComentarioVisita = $request->session()->get("siguienteComentarioVisita");
        }

        if($request->session()->get("siguienteFirma")){
            $siguienteFirma = $request->session()->get("siguienteFirma");
        }

        if ($siguienteInformacionAgencia == null) {
            $html = "<a href='/admin/informacionAgencia' class='btn btn-info'>Regresar</a>";
        } elseif ($siguienteInformacionGeneral == null) {
            $html = "<a href='/admin/informacionGeneral' class='btn btn-info'>Regresar</a>";
        } elseif ($siguienteInformacionCliente == null) {
            $html = "<a href='/admin/informacionCliente' class='btn btn-info'>Regresar</a>";
        } elseif ($siguienteInformacionReferencia == null) {
            $html = "<a href='/admin/informacionReferencia' class='btn btn-info'>Regresar</a>";
        } elseif ($siguienteInformacionAvalista == null) {
            $html = "<a href='/admin/informacionReferencia' class='btn btn-info'>Regresar</a>";
        } elseif ($siguienteResultadoVisita == null) {
            $html = "<a href='/admin/resultadoVisita' class='btn btn-info'>Regresar</a>";
        } elseif ($siguienteAcuerdoPago == null) {
            $html = "<a href='/admin/acuerdoPago' class='btn btn-info'>Regresar</a>";
        } elseif ($siguienteComentarioVisita == null) {
            $html = "<a href='/admin/comentarioVisita' class='btn btn-info'>Regresar</a>";
        } elseif ($siguienteFirma == null) {
            $html = "<a href='/admin/firma' class='btn btn-info'>Regresar</a>";
        }

        return Response::json(array('html' => $html));
    }

    public function verificarInformacionAgencia(Request $request)
    {
        $nombreDeLaAgencia = null;
        $franja = null;
        $fecha = null;
        $ciudad = null;

        if($request->session()->get("nombreDeLaAgencia")
    		|| $request->session()->get("franja")
    		|| $request->session()->get("fecha")
    		|| $request->session()->get("ciudad")
    	){
            $nombreDeLaAgencia = $request->session()->get("nombreDeLaAgencia");
            $franja = $request->session()->get("franja");
            $fecha = $request->session()->get("fecha");
            $ciudad = $request->session()->get("ciudad");
        }

        return Response::json(array('nombreDeLaAgencia' => $nombreDeLaAgencia,
        							'franja' => $franja,
        							'fecha' => $fecha,
        							'ciudad' => $ciudad
        						));
    }

    public function informacionAgenciaAlmacenar(Request $request)
    {
        $nombreDeLaAgencia = $_POST['nombreDeLaAgencia'];
        $franja = $_POST['franja'];
        $fecha = $_POST['fecha'];
        $ciudad = $_POST['ciudad'];

        $request->session()->put('nombreDeLaAgencia', $nombreDeLaAgencia);
        $request->session()->put('franja', $franja);
        $request->session()->put('fecha', $fecha);
        $request->session()->put('ciudad', $ciudad);

        return Response::json(array('html' => 'ok'));
    }

    public function informacionAgenciaContinuar(Request $request)
    {
        $siguienteInformacionAgencia = $_POST['siguienteInformacionAgencia'];

        $request->session()->put('siguienteInformacionAgencia', $siguienteInformacionAgencia);

        return Response::json(array('html' => 'ok'));
    }

    public function validarInformacionGeneral(Request $request)
    {
        $siguienteInformacionAgencia = null;

        if($request->session()->get("siguienteInformacionAgencia")){
            $siguienteInformacionAgencia = $request->session()->get("siguienteInformacionAgencia");
        }

        return Response::json(array('siguienteInformacionAgencia' => $siguienteInformacionAgencia));
    }

    public function verificarInformacionGeneral(Request $request)
    {
        $codAlivio = null;
        $obligacionN = null;
        $fechaDeDesembolso = null;
        $saldoCapital = null;
        $saldoTotal = null;
        $diasMora = null;
        $VrIntMora = null;
        $VrIntCorrientes = null;
        $VrSeguros = null;
        $VrGac = null;
        $calificacion = null;
        $etapaSapro = null;
        $invBienesINIC = null;
        $embargo = null;

        if($request->session()->get("codAlivio")
    		|| $request->session()->get("obligacionN")
    		|| $request->session()->get("fechaDeDesembolso")
    		|| $request->session()->get("saldoCapital")
    		|| $request->session()->get("saldoTotal")
    		|| $request->session()->get("diasMora")
    		|| $request->session()->get("VrIntMora")
    		|| $request->session()->get("VrIntCorrientes")
    		|| $request->session()->get("VrSeguros")
    		|| $request->session()->get("VrGac")
    		|| $request->session()->get("calificacion")
    		|| $request->session()->get("etapaSapro")
    		|| $request->session()->get("invBienesINIC")
    		|| $request->session()->get("embargo")
    	){
            $codAlivio = $request->session()->get("codAlivio");
            $obligacionN = $request->session()->get("obligacionN");
            $fechaDeDesembolso = $request->session()->get("fechaDeDesembolso");
            $saldoCapital = $request->session()->get("saldoCapital");
            $saldoTotal = $request->session()->get("saldoTotal");
            $diasMora = $request->session()->get("diasMora");
            $VrIntMora = $request->session()->get("VrIntMora");
            $VrIntCorrientes = $request->session()->get("VrIntCorrientes");
            $VrSeguros = $request->session()->get("VrSeguros");
            $VrGac = $request->session()->get("VrGac");
            $calificacion = $request->session()->get("calificacion");
            $etapaSapro = $request->session()->get("etapaSapro");
            $invBienesINIC = $request->session()->get("invBienesINIC");
            $embargo = $request->session()->get("embargo");
        }

        return Response::json(array('codAlivio' => $codAlivio,
        							'obligacionN' => $obligacionN,
        							'fechaDeDesembolso' => $fechaDeDesembolso,
        							'saldoCapital' => $saldoCapital,
        							'saldoTotal' => $saldoTotal,
        							'diasMora' => $diasMora,
        							'VrIntMora' => $VrIntMora,
        							'VrIntCorrientes' => $VrIntCorrientes,
        							'VrSeguros' => $VrSeguros,
        							'VrGac' => $VrGac,
        							'calificacion' => $calificacion,
        							'etapaSapro' => $etapaSapro,
        							'invBienesINIC' => $invBienesINIC,
        							'embargo' => $embargo
        						));
    }

    public function informacionGeneralAlmacenar(Request $request)
    {
        $codAlivio = $_POST['codAlivio'];
        $obligacionN = $_POST['obligacionN'];
        $fechaDeDesembolso = $_POST['fechaDeDesembolso'];
        $saldoCapital = $_POST['saldoCapital'];
        $saldoTotal = $_POST['saldoTotal'];
        $diasMora = $_POST['diasMora'];
        $VrIntMora = $_POST['VrIntMora'];
        $VrIntCorrientes = $_POST['VrIntCorrientes'];
        $VrSeguros = $_POST['VrSeguros'];
        $VrGac = $_POST['VrGac'];
        $calificacion = $_POST['calificacion'];
        $etapaSapro = $_POST['etapaSapro'];
        $invBienesINIC = $_POST['invBienesINIC'];
        $embargo = $_POST['embargo'];

        $request->session()->put('codAlivio', $codAlivio);
        $request->session()->put('obligacionN', $obligacionN);
        $request->session()->put('fechaDeDesembolso', $fechaDeDesembolso);
        $request->session()->put('saldoCapital', $saldoCapital);
        $request->session()->put('saldoTotal', $saldoTotal);
        $request->session()->put('diasMora', $diasMora);
        $request->session()->put('VrIntMora', $VrIntMora);
        $request->session()->put('VrIntCorrientes', $VrIntCorrientes);
        $request->session()->put('VrSeguros', $VrSeguros);
        $request->session()->put('VrGac', $VrGac);
        $request->session()->put('calificacion', $calificacion);
        $request->session()->put('etapaSapro', $etapaSapro);
        $request->session()->put('invBienesINIC', $invBienesINIC);
        $request->session()->put('embargo', $embargo);

        return Response::json(array('html' => 'ok'));
    }

    public function informacionGeneralContinuar(Request $request)
    {
        $siguienteInformacionGeneral = $_POST['siguienteInformacionGeneral'];

        $request->session()->put('siguienteInformacionGeneral', $siguienteInformacionGeneral);

        return Response::json(array('html' => 'ok'));
    }

    public function validarInformacionCliente(Request $request)
    {
        $siguienteInformacionGeneral = null;

        if($request->session()->get("siguienteInformacionGeneral")){
            $siguienteInformacionGeneral = $request->session()->get("siguienteInformacionGeneral");
        }

        return Response::json(array('siguienteInformacionGeneral' => $siguienteInformacionGeneral));
    }

    public function verificarInformacionCliente(Request $request)
    {
        $nombresApellidos = null;
		$documentoIdentificacion = null;
		$correo = null;
		$celular = null;
		$direccion = null;
		$telefono = null;
		$direccionOficiona = null;
		$telefonoOficina = null;
		$direccionDeMayorContacto = null;
		$direccionVisita = null;

        if($request->session()->get("nombresApellidos")
    		|| $request->session()->get("documentoIdentificacion")
    		|| $request->session()->get("correo")
    		|| $request->session()->get("celular")
    		|| $request->session()->get("direccion")
    		|| $request->session()->get("telefono")
    		|| $request->session()->get("direccionOficiona")
    		|| $request->session()->get("telefonoOficina")
    		|| $request->session()->get("direccionDeMayorContacto")
    		|| $request->session()->get("direccionVisita")
    	){
            $nombresApellidos = $request->session()->get("nombresApellidos");
            $documentoIdentificacion = $request->session()->get("documentoIdentificacion");
            $correo = $request->session()->get("correo");
            $celular = $request->session()->get("celular");
            $direccion = $request->session()->get("direccion");
            $telefono = $request->session()->get("telefono");
            $direccionOficiona = $request->session()->get("direccionOficiona");
            $telefonoOficina = $request->session()->get("telefonoOficina");
            $direccionDeMayorContacto = $request->session()->get("direccionDeMayorContacto");
            $direccionVisita = $request->session()->get("direccionVisita");
        }

        return Response::json(array('nombresApellidos' => $nombresApellidos,
        							'documentoIdentificacion' => $documentoIdentificacion,
        							'correo' => $correo,
        							'celular' => $celular,
        							'direccion' => $direccion,
        							'telefono' => $telefono,
        							'direccionOficiona' => $direccionOficiona,
        							'telefonoOficina' => $telefonoOficina,
        							'direccionDeMayorContacto' => $direccionDeMayorContacto,
        							'direccionVisita' => $direccionVisita
        							));
    }

    public function informacionClienteAlmacenar(Request $request)
    {
        $nombresApellidos = $_POST['nombresApellidos'];
        $documentoIdentificacion = $_POST['documentoIdentificacion'];
        $correo = $_POST['correo'];
        $celular = $_POST['celular'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $direccionOficiona = $_POST['direccionOficiona'];
        $telefonoOficina = $_POST['telefonoOficina'];
        $direccionDeMayorContacto = $_POST['direccionDeMayorContacto'];
        $direccionVisita = $_POST['direccionVisita'];

        $request->session()->put('nombresApellidos', $nombresApellidos);
        $request->session()->put('documentoIdentificacion', $documentoIdentificacion);
        $request->session()->put('correo', $correo);
        $request->session()->put('celular', $celular);
        $request->session()->put('direccion', $direccion);
        $request->session()->put('telefono', $telefono);
        $request->session()->put('direccionOficiona', $direccionOficiona);
        $request->session()->put('telefonoOficina', $telefonoOficina);
        $request->session()->put('direccionDeMayorContacto', $direccionDeMayorContacto);
        $request->session()->put('direccionVisita', $direccionVisita);

        return Response::json(array('html' => 'ok'));
    }

    public function informacionClienteContinuar(Request $request)
    {
        $siguienteInformacionCliente = $_POST['siguienteInformacionCliente'];

        $request->session()->put('siguienteInformacionCliente', $siguienteInformacionCliente);

        return Response::json(array('html' => 'ok'));
    }

    public function validarInformacionReferencia(Request $request)
    {
        $siguienteInformacionCliente = null;

        if($request->session()->get("siguienteInformacionCliente")){
            $siguienteInformacionCliente = $request->session()->get("siguienteInformacionCliente");
        }

        return Response::json(array('siguienteInformacionCliente' => $siguienteInformacionCliente));
    }

    public function verificarInformacionReferencia(Request $request)
    {
        $referencia = null;
        $nombresApellidosReferencia = null;
		$telefonoReferencia = null;

        if($request->session()->get("referencia")
    		|| $request->session()->get("nombresApellidosReferencia")
    		|| $request->session()->get("telefonoReferencia")
    	){
            $referencia = $request->session()->get("referencia");
            $nombresApellidosReferencia = $request->session()->get("nombresApellidosReferencia");
            $telefonoReferencia = $request->session()->get("telefonoReferencia");
        }

        return Response::json(array('referencia' => $referencia,
        							'nombresApellidosReferencia' => $nombresApellidosReferencia,
        							'telefonoReferencia' => $telefonoReferencia,
        							));
    }

    public function informacionReferenciaAlmacenar(Request $request)
    {
        $referencia = $_POST['referencia'];
        $nombresApellidosReferencia = $_POST['nombresApellidosReferencia'];
        $telefonoReferencia = $_POST['telefonoReferencia'];

        $request->session()->put('referencia', $referencia);
        $request->session()->put('nombresApellidosReferencia', $nombresApellidosReferencia);
        $request->session()->put('telefonoReferencia', $telefonoReferencia);

        return Response::json(array('html' => 'ok'));
    }

    public function informacionReferenciaContinuar(Request $request)
    {
        $siguienteInformacionReferencia = $_POST['siguienteInformacionReferencia'];

        $request->session()->put('siguienteInformacionReferencia', $siguienteInformacionReferencia);

        return Response::json(array('html' => 'ok'));
    }

    public function validarInformacionAvalista(Request $request)
    {
        $siguienteInformacionReferencia = null;

        if($request->session()->get("siguienteInformacionReferencia")){
            $siguienteInformacionReferencia = $request->session()->get("siguienteInformacionReferencia");
        }

        return Response::json(array('siguienteInformacionReferencia' => $siguienteInformacionReferencia));
    }

    public function verificarInformacionAvalista(Request $request)
    {
        $codigoGarantia = null;
		$nombresApellidosAvalista = null;
		$telefonoAvalista = null;
		$ocupacion = null;
		$observacion = null;

        if($request->session()->get("codigoGarantia")
    		|| $request->session()->get("nombresApellidosAvalista")
    		|| $request->session()->get("telefonoAvalista")
    		|| $request->session()->get("ocupacion")
    		|| $request->session()->get("observacion")
    	){
            $codigoGarantia = $request->session()->get("codigoGarantia");
            $nombresApellidosAvalista = $request->session()->get("nombresApellidosAvalista");
            $telefonoAvalista = $request->session()->get("telefonoAvalista");
            $ocupacion = $request->session()->get("ocupacion");
            $observacion = $request->session()->get("observacion");
        }

        return Response::json(array('codigoGarantia' => $codigoGarantia,
        							'nombresApellidosAvalista' => $nombresApellidosAvalista,
        							'telefonoAvalista' => $telefonoAvalista,
        							'ocupacion' => $ocupacion,
        							'observacion' => $observacion
        							));
    }

    public function informacionAvalistaAlmacenar(Request $request)
    {
        $codigoGarantia = $_POST['codigoGarantia'];
        $nombresApellidosAvalista = $_POST['nombresApellidosAvalista'];
        $telefonoAvalista = $_POST['telefonoAvalista'];
        $ocupacion = $_POST['ocupacion'];
        $observacion = $_POST['observacion'];

        if ($observacion == "") {
        	 $observacion = null;
        }

        $request->session()->put('codigoGarantia', $codigoGarantia);
        $request->session()->put('nombresApellidosAvalista', $nombresApellidosAvalista);
        $request->session()->put('telefonoAvalista', $telefonoAvalista);
        $request->session()->put('ocupacion', $ocupacion);
        $request->session()->put('observacion', $observacion);

        return Response::json(array('html' => 'ok'));
    }

    public function informacionAvalistaContinuar(Request $request)
    {
        $siguienteInformacionAvalista = $_POST['siguienteInformacionAvalista'];

        $request->session()->put('siguienteInformacionAvalista', $siguienteInformacionAvalista);

        return Response::json(array('html' => 'ok'));
    }

    public function validarResultadoVisita(Request $request)
    {
        $siguienteInformacionAvalista = null;

        if($request->session()->get("siguienteInformacionAvalista")){
            $siguienteInformacionAvalista = $request->session()->get("siguienteInformacionAvalista");
        }

        return Response::json(array('siguienteInformacionAvalista' => $siguienteInformacionAvalista));
    }

    public function verificarResultadoVisita(Request $request)
    {
        $contactaTitular = null;
        $noContactaTitular = null;
        $nombresApellidosVisita = null;
        $parentesco = null;
        $actividadEconomica = null;
        $noPago = null;
        $observacionesNoPago = null;

        if($request->session()->get("contactaTitular")
            || $request->session()->get("noContactaTitular")
            || $request->session()->get("nombresApellidosVisita")
            || $request->session()->get("parentesco")
            || $request->session()->get("actividadEconomica")
            || $request->session()->get("noPago")
            || $request->session()->get("observacionesNoPago")
        ){
            $contactaTitular = $request->session()->get("contactaTitular");
            $noContactaTitular = $request->session()->get("noContactaTitular");
            $nombresApellidosVisita = $request->session()->get("nombresApellidosVisita");
            $parentesco = $request->session()->get("parentesco");
            $actividadEconomica = $request->session()->get("actividadEconomica");
            $noPago = $request->session()->get("noPago");
            $observacionesNoPago = $request->session()->get("observacionesNoPago");
        }

        return Response::json(array('contactaTitular' => $contactaTitular,
                                    'noContactaTitular' => $noContactaTitular,
                                    'nombresApellidosVisita' => $nombresApellidosVisita,
                                    'parentesco' => $parentesco,
                                    'actividadEconomica' => $actividadEconomica,
                                    'noPago' => $noPago,
                                    'observacionesNoPago' => $observacionesNoPago
                                    ));
    }

    public function resultadoVisitaAlmacenar(Request $request)
    {
        $contactaTitular = $_POST['contactaTitular'];
        $noContactaTitular = $_POST['noContactaTitular'];
        $nombresApellidosVisita = $_POST['nombresApellidosVisita'];
        $parentesco = $_POST['parentesco'];
        $actividadEconomica = $_POST['actividadEconomica'];
        $noPago = $_POST['noPago'];
        $observacionesNoPago = $_POST['observacionesNoPago'];

        $request->session()->put('contactaTitular', $contactaTitular);
        $request->session()->put('noContactaTitular', $noContactaTitular);
        $request->session()->put('nombresApellidosVisita', $nombresApellidosVisita);
        $request->session()->put('parentesco', $parentesco);
        $request->session()->put('actividadEconomica', $actividadEconomica);
        $request->session()->put('noPago', $noPago);
        $request->session()->put('observacionesNoPago', $observacionesNoPago);

        return Response::json(array('html' => 'ok'));
    }

    public function resultadoVisitaContinuar(Request $request)
    {
        $siguienteResultadoVisita = $_POST['siguienteResultadoVisita'];

        $request->session()->put('siguienteResultadoVisita', $siguienteResultadoVisita);

        return Response::json(array('html' => 'ok'));
    }

    public function validarAcuerdoPago(Request $request)
    {
        $siguienteResultadoVisita = null;

        if($request->session()->get("siguienteResultadoVisita")){
            $siguienteResultadoVisita = $request->session()->get("siguienteResultadoVisita");
        }

        return Response::json(array('siguienteResultadoVisita' => $siguienteResultadoVisita));
    }

    public function verificarAcuerdoPago(Request $request)
    {
		$acuerdo = null;
		$nDeProducto = null;
		$fechaCompromiso = null;
		$vrPromesa = null;
		$alternativa = null;

        if($request->session()->get("acuerdo")
            || $request->session()->get("nDeProducto")
            || $request->session()->get("fechaCompromiso")
            || $request->session()->get("vrPromesa")
            || $request->session()->get("alternativa")
        ){
            $acuerdo = $request->session()->get("acuerdo");
            $nDeProducto = $request->session()->get("nDeProducto");
            $fechaCompromiso = $request->session()->get("fechaCompromiso");
            $vrPromesa = $request->session()->get("vrPromesa");
            $alternativa = $request->session()->get("alternativa");
        }

        return Response::json(array('acuerdo' => $acuerdo,
                                    'nDeProducto' => $nDeProducto,
                                    'fechaCompromiso' => $fechaCompromiso,
                                    'vrPromesa' => $vrPromesa,
                                    'alternativa' => $alternativa
                                    ));
    }

    public function acuerdoPagoAlmacenar(Request $request)
    {
        $acuerdo = $_POST['acuerdo'];
        $nDeProducto = $_POST['nDeProducto'];
        $fechaCompromiso = $_POST['fechaCompromiso'];
        $vrPromesa = $_POST['vrPromesa'];
        $alternativa = $_POST['alternativa'];

        $request->session()->put('acuerdo', $acuerdo);
        $request->session()->put('nDeProducto', $nDeProducto);
        $request->session()->put('fechaCompromiso', $fechaCompromiso);
        $request->session()->put('vrPromesa', $vrPromesa);
        $request->session()->put('alternativa', $alternativa);

        return Response::json(array('html' => 'ok'));
    }

    public function acuerdoPagoContinuar(Request $request)
    {
        $siguienteAcuerdoPago = $_POST['siguienteAcuerdoPago'];

        $request->session()->put('siguienteAcuerdoPago', $siguienteAcuerdoPago);

        return Response::json(array('html' => 'ok'));
    }

    public function validarComentarioVisita(Request $request)
    {
        $siguienteAcuerdoPago = null;

        if($request->session()->get("siguienteAcuerdoPago")){
            $siguienteAcuerdoPago = $request->session()->get("siguienteAcuerdoPago");
        }

        return Response::json(array('siguienteAcuerdoPago' => $siguienteAcuerdoPago));
    }

    public function verificarComentarioVisita(Request $request)
    {
		$comentario = null;
        $efectoVisita = null;
        $motivo = null;
        $otroMotivo = null;
        $direccionInexistente = null;
        $subrogacion = null;
        $tipoContacto = null;

        if($request->session()->get("comentario")
            || $request->session()->get("efectoVisita")
            || $request->session()->get("motivo")
            || $request->session()->get("otroMotivo")
            || $request->session()->get("direccionInexistente")
            || $request->session()->get("subrogacion")
            || $request->session()->get("tipoContacto")
        ){
            $comentario = $request->session()->get("comentario");
            $efectoVisita = $request->session()->get("efectoVisita");
            $motivo = $request->session()->get("motivo");
            $otroMotivo = $request->session()->get("otroMotivo");
            $direccionInexistente = $request->session()->get("direccionInexistente");
            $subrogacion = $request->session()->get("subrogacion");
            $tipoContacto = $request->session()->get("tipoContacto");
        }

        return Response::json(array('comentario' => $comentario,
                                    'efectoVisita' => $efectoVisita,
                                    'motivo' => $motivo,
                                    'otroMotivo' => $otroMotivo,
                                    'direccionInexistente' => $direccionInexistente,
                                    'subrogacion' => $subrogacion,
                                    'tipoContacto' => $tipoContacto
                                    ));
    }

    public function comentarioVisitaAlmacenar(Request $request)
    {
        $comentario = $_POST['comentario'];
        $efectoVisita = $_POST['efectoVisita'];
        $motivo = $_POST['motivo'];
        $otroMotivo = $_POST['otroMotivo'];
        $direccionInexistente = $_POST['direccionInexistente'];
        $subrogacion = $_POST['subrogacion'];
        $tipoContacto = $_POST['tipoContacto'];

        $request->session()->put('comentario', $comentario);
        $request->session()->put('efectoVisita', $efectoVisita);
        $request->session()->put('motivo', $motivo);
        $request->session()->put('otroMotivo', $otroMotivo);
        $request->session()->put('direccionInexistente', $direccionInexistente);
        $request->session()->put('subrogacion', $subrogacion);
        $request->session()->put('tipoContacto', $tipoContacto);

        return Response::json(array('html' => 'ok'));
    }

    public function comentarioVisitaContinuar(Request $request)
    {
        $siguienteComentarioVisita = $_POST['siguienteComentarioVisita'];

        $request->session()->put('siguienteComentarioVisita', $siguienteComentarioVisita);

        return Response::json(array('html' => 'ok'));
    }

    public function validarFirma(Request $request)
    {
        $siguienteComentarioVisita = null;

        if($request->session()->get("siguienteComentarioVisita")){
            $siguienteComentarioVisita = $request->session()->get("siguienteComentarioVisita");
        }

        return Response::json(array('siguienteComentarioVisita' => $siguienteComentarioVisita));
    }

    public function coordenadas(Request $request)
    {
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];

        $request->session()->put('lat', $lat);
        $request->session()->put('lng', $lng);

        return Response::json(array('html' => 'ok'));
    }

    public function firmaAlmacenar(Request $request)
    {
        $boolean = False;

        $agencies = Agency::orderBy('id', 'desc')
                            ->limit(1)
                            ->get();
        foreach ($agencies as $agency) {
            $id = $agency->id;
            $boolean = True;
        }

        if ($boolean == False) {
            $id = 1;
        } else {
            $id = $id + 1;
        }

        $file = $request->file('file');
        $name = "Firma";
        Storage::disk('public2')->put($id.$name.".png",  File::get($file));

        $firma = "public/img/firmas/".$id.$name.".png";

        $request->session()->put('firma', $firma);

        $siguienteFirma = "true";

        $request->session()->put('siguienteFirma', $siguienteFirma);

        return redirect('/admin/subiendo');
    }

    public function validarTodo(Request $request)
    {
        $siguienteFirma = null;

        if($request->session()->get("siguienteFirma")){
            $siguienteFirma = $request->session()->get("siguienteFirma");
        }

        return Response::json(array('siguienteFirma' => $siguienteFirma));
    }

    public function guardar(Request $request)
    {
        $nombreDeLaAgencia = $request->session()->get("nombreDeLaAgencia");
        $franja = $request->session()->get("franja");
        $fecha = $request->session()->get("fecha");
        $ciudad = $request->session()->get("ciudad");

        $create_agency = new Agency;
        $create_agency->name = $nombreDeLaAgencia;
        $create_agency->time_zone = $franja;
        $create_agency->date = $fecha;
        $create_agency->city = $ciudad;
        $create_agency->user_id = Auth::user()->id;
        $create_agency->save();

        $codAlivio = $request->session()->get("codAlivio");
        $obligacionN = $request->session()->get("obligacionN");
        $fechaDeDesembolso = $request->session()->get("fechaDeDesembolso");
        $saldoCapital = $request->session()->get("saldoCapital");
        $saldoTotal = $request->session()->get("saldoTotal");
        $diasMora = $request->session()->get("diasMora");
        $VrIntMora = $request->session()->get("VrIntMora");
        $VrIntCorrientes = $request->session()->get("VrIntCorrientes");
        $VrSeguros = $request->session()->get("VrSeguros");
        $VrGac = $request->session()->get("VrGac");
        $calificacion = $request->session()->get("calificacion");
        $etapaSapro = $request->session()->get("etapaSapro");
        $invBienesINIC = $request->session()->get("invBienesINIC");
        $embargo = $request->session()->get("embargo");

        $agencies = Agency::orderBy('id', 'desc')
                            ->limit(1)
                            ->get();

        foreach ($agencies as $agency) {
            $agency_id = $agency->id;
        }

        $create_general = new General;
        $create_general->relief_code = $codAlivio;
        $create_general->obligation_n = $obligacionN;
        $create_general->disbursement_date = $fechaDeDesembolso;
        $create_general->capital_balance = $saldoCapital;
        $create_general->total_balance = $saldoTotal;
        $create_general->day_past_due = $diasMora;
        $create_general->interest_value_arrear = $VrIntMora;
        $create_general->current_interest_value = $VrIntCorrientes;
        $create_general->safe_value = $VrSeguros;
        $create_general->gac_value = $VrGac;
        $create_general->qualification = $calificacion;
        $create_general->sapro_stage = $etapaSapro;
        $create_general->inv_inic_good = $invBienesINIC;
        $create_general->embargo = $embargo;
        $create_general->agency_id = $agency_id;
        $create_general->save();

        $nombresApellidos = $request->session()->get("nombresApellidos");
        $documentoIdentificacion = $request->session()->get("documentoIdentificacion");
        $correo = $request->session()->get("correo");
        $celular = $request->session()->get("celular");
        $direccion = $request->session()->get("direccion");
        $telefono = $request->session()->get("telefono");
        $direccionOficiona = $request->session()->get("direccionOficiona");
        $telefonoOficina = $request->session()->get("telefonoOficina");
        $direccionDeMayorContacto = $request->session()->get("direccionDeMayorContacto");
        $direccionVisita = $request->session()->get("direccionVisita");

        $generals = General::orderBy('id', 'desc')
                            ->limit(1)
                            ->get();

        foreach ($generals as $general) {
            $general_id = $general->id;
        }

        $create_client = new Client;
        $create_client->name_lastname = $nombresApellidos;
        $create_client->identification_document = $documentoIdentificacion;
        $create_client->email = $correo;
        $create_client->cell_phone = $celular;
        $create_client->residence_address = $direccion;
        $create_client->residence_phone = $telefono;
        $create_client->business_address = $direccionOficiona;
        $create_client->office_phone = $telefonoOficina;
        $create_client->most_contact_address = $direccionDeMayorContacto;
        $create_client->address_of_visit = $direccionVisita;
        $create_client->general_id = $general_id;
        $create_client->save();

        $referencia = $request->session()->get("referencia");
        $nombresApellidosReferencia = $request->session()->get("nombresApellidosReferencia");
        $telefonoReferencia = $request->session()->get("telefonoReferencia");

        $clients = Client::orderBy('id', 'desc')
                            ->limit(1)
                            ->get();

        foreach ($clients as $client) {
            $client_id = $client->id;
        }

        $create_reference = new Reference;
        $create_reference->reference = $referencia;
        $create_reference->name_lastname_reference = $nombresApellidosReferencia;
        $create_reference->reference_phone = $telefonoReferencia;
        $create_reference->client_id = $client_id;
        $create_reference->save();

        $codigoGarantia = $request->session()->get("codigoGarantia");
        $nombresApellidosAvalista = $request->session()->get("nombresApellidosAvalista");
        $telefonoAvalista = $request->session()->get("telefonoAvalista");
        $ocupacion = $request->session()->get("ocupacion");
        $observacion = $request->session()->get("observacion");

        $references = Reference::orderBy('id', 'desc')
                            ->limit(1)
                            ->get();

        foreach ($references as $reference) {
            $reference_id = $reference->id;
        }

        $create_guarantor = new Guarantor;
        $create_guarantor->guarantee_code = $codigoGarantia;
        $create_guarantor->name_lastname_guarantee = $nombresApellidosAvalista;
        $create_guarantor->guarantee_phone = $telefonoAvalista;
        $create_guarantor->ocupation = $ocupacion;
        $create_guarantor->observation = $observacion;
        $create_guarantor->reference_id = $reference_id;
        $create_guarantor->save();

        $contactaTitular = $request->session()->get("contactaTitular");
        $noContactaTitular = $request->session()->get("noContactaTitular");
        $nombresApellidosVisita = $request->session()->get("nombresApellidosVisita");
        $parentesco = $request->session()->get("parentesco");
        $actividadEconomica = $request->session()->get("actividadEconomica");
        $noPago = $request->session()->get("noPago");
        $observacionesNoPago = $request->session()->get("observacionesNoPago");

        $guarantors = Guarantor::orderBy('id', 'desc')
                            ->limit(1)
                            ->get();

        foreach ($guarantors as $guarantor) {
            $guarantor_id = $guarantor->id;
        }

        $create_visit = new Visit;
        $create_visit->contact_owner = $contactaTitular;
        if ($noContactaTitular == "") {
            $noContactaTitular = null;
        }
        $create_visit->no_Contact_owner = $noContactaTitular;
        $create_visit->name_lastname_visit = $nombresApellidosVisita;
        $create_visit->relationship = $parentesco;
        $create_visit->economic_activity = $actividadEconomica;
        $create_visit->reason_not_payment = $noPago;
        $create_visit->observations_not_payment = $observacionesNoPago;
        $create_visit->guarantor_id = $guarantor_id;
        $create_visit->save();

        $acuerdo = $request->session()->get("acuerdo");
        $nDeProducto = $request->session()->get("nDeProducto");
        $fechaCompromiso = $request->session()->get("fechaCompromiso");
        $vrPromesa = $request->session()->get("vrPromesa");
        $alternativa = $request->session()->get("alternativa");

        $visits = Visit::orderBy('id', 'desc')
                            ->limit(1)
                            ->get();

        foreach ($visits as $visit) {
            $visit_id = $visit->id;
        }

        $create_agreement = new Agreement;
        $create_agreement->payment_agreement = $acuerdo;
        $create_agreement->product = $nDeProducto;
        $create_agreement->commitment_date = $fechaCompromiso;
        $create_agreement->promise_value = $vrPromesa;
        $create_agreement->alternative = $alternativa;
        $create_agreement->visit_id = $visit_id;
        $create_agreement->save();

        $comentario = $request->session()->get("comentario");
        $efectoVisita = $request->session()->get("efectoVisita");
        $motivo = $request->session()->get("motivo");
        $otroMotivo = $request->session()->get("otroMotivo");
        $direccionInexistente = $request->session()->get("direccionInexistente");
        $subrogacion = $request->session()->get("subrogacion");
        $tipoContacto = $request->session()->get("tipoContacto");

        $agreements = Agreement::orderBy('id', 'desc')
                            ->limit(1)
                            ->get();

        foreach ($agreements as $agreement) {
            $agreement_id = $agreement->id;
        }

        $create_commentary = new Commentary;
        $create_commentary->commentary = $comentario;
        $create_commentary->visit_effect = $efectoVisita;
        $create_commentary->inaccessible_place = $motivo;
        $create_commentary->another_reason = $otroMotivo;
        $create_commentary->non_existent_address = $direccionInexistente;
        $create_commentary->Subrogation = $subrogacion;
        $create_commentary->type_of_contact = $tipoContacto;
        $create_commentary->agreement_id = $agreement_id;
        $create_commentary->save();

        $firma = $request->session()->get("firma");

        $commentaries = Commentary::orderBy('id', 'desc')
                            ->limit(1)
                            ->get();

        foreach ($commentaries as $commentary) {
            $commentary_id = $commentary->id;
        }

        $create_firm = new Firm;
        $create_firm->firm = $firma;
        $create_firm->commentary_id = $commentary_id;
        $create_firm->save();

        $lat = $request->session()->get("lat");
        $lng = $request->session()->get("lng");

        $firms = Firm::orderBy('id', 'desc')
                            ->limit(1)
                            ->get();

        foreach ($firms as $firm) {
            $firm_id = $firm->id;
        }

        $create_localitation = new Localitation;
        $create_localitation->breite = $lat;
        $create_localitation->Lange = $lng;
        $create_localitation->firm_id = $firm_id;
        $create_localitation->save();

        $request->session()->forget('nombreDeLaAgencia');
        $request->session()->forget('franja');
        $request->session()->forget('fecha');
        $request->session()->forget('ciudad');

        $request->session()->forget('codAlivio');
        $request->session()->forget('obligacionN');
        $request->session()->forget('fechaDeDesembolso');
        $request->session()->forget('saldoCapital');
        $request->session()->forget('saldoTotal');
        $request->session()->forget('diasMora');
        $request->session()->forget('VrIntMora');
        $request->session()->forget('VrIntCorrientes');
        $request->session()->forget('VrSeguros');
        $request->session()->forget('VrGac');
        $request->session()->forget('calificacion');
        $request->session()->forget('etapaSapro');
        $request->session()->forget('invBienesINIC');
        $request->session()->forget('embargo');

        $request->session()->forget('nombresApellidos');
        $request->session()->forget('documentoIdentificacion');
        $request->session()->forget('correo');
        $request->session()->forget('celular');
        $request->session()->forget('direccion');
        $request->session()->forget('telefono');
        $request->session()->forget('direccionOficiona');
        $request->session()->forget('telefonoOficina');
        $request->session()->forget('direccionDeMayorContacto');
        $request->session()->forget('direccionVisita');

        $request->session()->forget('referencia');
        $request->session()->forget('nombresApellidosReferencia');
        $request->session()->forget('telefonoReferencia');

        $request->session()->forget('codigoGarantia');
        $request->session()->forget('nombresApellidosAvalista');
        $request->session()->forget('telefonoAvalista');
        $request->session()->forget('ocupacion');
        $request->session()->forget('observacion');

        $request->session()->forget('contactaTitular');
        $request->session()->forget('noContactaTitular');
        $request->session()->forget('nombresApellidosVisita');
        $request->session()->forget('parentesco');
        $request->session()->forget('actividadEconomica');
        $request->session()->forget('noPago');
        $request->session()->forget('observacionesNoPago');

        $request->session()->forget('acuerdo');
        $request->session()->forget('nDeProducto');
        $request->session()->forget('fechaCompromiso');
        $request->session()->forget('vrPromesa');
        $request->session()->forget('alternativa');

        $request->session()->forget('comentario');
        $request->session()->forget('efectoVisita');
        $request->session()->forget('motivo');
        $request->session()->forget('otroMotivo');
        $request->session()->forget('direccionInexistente');
        $request->session()->forget('subrogacion');
        $request->session()->forget('tipoContacto');

        $request->session()->forget('lat');
        $request->session()->forget('lng');

        $request->session()->forget('firma');

        $request->session()->forget("siguienteInformacionAgencia");
        
        $request->session()->forget("siguienteInformacionGeneral");
        
        $request->session()->forget("siguienteInformacionCliente");
        
        $request->session()->forget("siguienteInformacionReferencia");
        
        $request->session()->forget("siguienteInformacionAvalista");
        
        $request->session()->forget("siguienteResultadoVisita");
        
        $request->session()->forget("siguienteAcuerdoPago");
        
        $request->session()->forget("siguienteComentarioVisita");
        
        $request->session()->forget("siguienteFirma");
        
        return Response::json(array('html' => "ok"));
    }
}
