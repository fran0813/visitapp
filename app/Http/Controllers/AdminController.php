<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \Response;

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
        $request->session()->put('diasMora', $diasMora);
        $request->session()->put('VrIntMora', $VrIntMora);
        $request->session()->put('VrIntCorrientes', $VrIntCorrientes);
        $request->session()->put('VrSeguros', $VrSeguros);
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
            $nombresApellidosReferencia = $request->session()->get("referencia");
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

    public function comentarioVisitaAlmacenar(Request $request)
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

    public function comentarioVisitaContinuar(Request $request)
    {
        $siguienteComentarioVisita = $_POST['siguienteComentarioVisita'];

        $request->session()->put('siguienteComentarioVisita', $siguienteComentarioVisita);

        return Response::json(array('html' => 'ok'));
    }
}
