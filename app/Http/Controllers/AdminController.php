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
        $etapaSapro = null;
        $invBienesINIC = null;
        $embargo = null;

        if($request->session()->get("codAlivio")
    		|| $request->session()->get("obligacionN")
    		|| $request->session()->get("fechaDeDesembolso")
    		|| $request->session()->get("saldoCapital")
    		|| $request->session()->get("saldoTotal")
    		|| $request->session()->get("etapaSapro")
    		|| $request->session()->get("invBienesINIC")
    		|| $request->session()->get("embargo")
    	){
            $codAlivio = $request->session()->get("codAlivio");
            $obligacionN = $request->session()->get("obligacionN");
            $fechaDeDesembolso = $request->session()->get("fechaDeDesembolso");
            $saldoCapital = $request->session()->get("saldoCapital");
            $saldoTotal = $request->session()->get("saldoTotal");
            $etapaSapro = $request->session()->get("etapaSapro");
            $invBienesINIC = $request->session()->get("invBienesINIC");
            $embargo = $request->session()->get("embargo");
        }

        return Response::json(array('codAlivio' => $codAlivio,
        							'obligacionN' => $obligacionN,
        							'fechaDeDesembolso' => $fechaDeDesembolso,
        							'saldoCapital' => $saldoCapital,
        							'saldoTotal' => $saldoTotal,
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
        $etapaSapro = $_POST['etapaSapro'];
        $invBienesINIC = $_POST['invBienesINIC'];
        $embargo = $_POST['embargo'];

        $request->session()->put('codAlivio', $codAlivio);
        $request->session()->put('obligacionN', $obligacionN);
        $request->session()->put('fechaDeDesembolso', $fechaDeDesembolso);
        $request->session()->put('saldoCapital', $saldoCapital);
        $request->session()->put('saldoTotal', $saldoTotal);
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
        $nombresApellidosReferencia = null;
		$telefonoReferencia = null;

        if($request->session()->get("nombresApellidosReferencia")
    		|| $request->session()->get("telefonoReferencia")
    	){
            $nombresApellidosReferencia = $request->session()->get("nombresApellidosReferencia");
            $telefonoReferencia = $request->session()->get("telefonoReferencia");
        }

        return Response::json(array('nombresApellidosReferencia' => $nombresApellidosReferencia,
        							'telefonoReferencia' => $telefonoReferencia,
        							));
    }

    public function informacionReferenciaAlmacenar(Request $request)
    {
        $nombresApellidosReferencia = $_POST['nombresApellidosReferencia'];
        $telefonoReferencia = $_POST['telefonoReferencia'];

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

    public function resultadoVisitaAlmacenar(Request $request)
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

    public function resultadoVisitaContinuar(Request $request)
    {
        $siguienteResultadoVisita = $_POST['siguienteInformacionAvalista'];

        $request->session()->put('siguienteInformacionAvalista', $siguienteInformacionAvalista);

        return Response::json(array('html' => 'ok'));
    }
}
