/**
 * modelo de datos que se envian por post al servidor
 * @type {{centroCosto: {zona: string, usuario_id: number, facturar: string}, serviciosEsp: *[]}}
 */

const data = {
    "centroCosto": {
        "usuario_id": 1,
        "zona": "no aplica",
        "facturar":  "true"
    },
    "serviciosEsp": [
        {
            "evaluado": "cristian puenguenan",
            "documento": 1026595856,
            "telefono": 3123423,
            "email": "styven21121@gmail.com",
            "ciudad": "Bogota",
            "direccion": "cll 16 n 20-16",
            "observaciones": "ninguna",
            "tipoEsp": "basico",
            "aceptarTerminos": true
        },
        {
            "evaluado": "Andres velez",
            "documento": 6543456765,
            "telefono": 423234,
            "email": "andres@gmail.com",
            "ciudad": "Bogota",
            "direccion": "cll 65 n 20-16",
            "observaciones": "ninguna",
            "tipoEsp": "basico",
            "aceptarTerminos": true
        }
    ],
    "poligrafias": [
        {
            "evaluado": "cristian puenguenan",
            "documento": 123523,
            "departamento": "cundinamarca",
            "ciudad": "bogota",
            "telefono": 2123232,
            "email": "st@gmail.com",
            "contexto": "context",
            "tipoPoligrafia": "pre-empleo",
        },
        {
            "evaluado": "nadie",
            "documento": 234354,
            "departamento": "cundinamarca",
            "ciudad": "bogota",
            "telefono": 756434,
            "email": "nobody@gmail.com",
            "contexto": "context",
            "tipoPoligrafia": "pre-empleo",
        }
    ],
    'investigacion': [
        {
            "ciudad": 'bogota',
            "descripcion": "descripcion de algo"
        },
        {
            "ciudad": 'bogota',
            "descripcion": "descripcion de algo xd"
        }
    ]
};

const historialJudicial = {
    "procesoJuridico"           : true,
    "procesoProcuraduria"       : true,
    "procesoContraloria"        : true,
    "procesoFiscalia"           : true,
    "procesoPolicia"            : true,
    "procesoTransito"           : true,
    "verificacion"              : true,
    "ordenCapturaInternacional" : true,
    "sancionesPenales"          : true,
    "delitoProcuraduria"        : true,
    "inhabilidadesProcuraduria" : true,
    "fechaInhabilidad"          : "2016-02-10",
    "antecedentesFiscales"      : true,
    "fechaAntecedente"          : "2018-02-10",
    "claseProceso"              : "clase_proceso",
    "datosSentencia"            : "datos_sentencia",
    "delitoJudicial"            : "delito_judicial",
    "situacionJuridica"         : "situacion_juridica",
    "fgnNs"                     : "test",
    "listaOfac"                 : true,
    "listaOnu"                  : true,
    "vinculosSubversion"        : true,
    "antecedentesPolicia"       : true,
    "paramilitarismo"           : true,
    "movilidad"                 : false,
    "totalAcuerdo"              : 12334323,
    "observaciones"             : "observaciones"
};


const mails = {

    mailAnalistaEspToFreelance: {
        "mailTo": "analistaEspToFreelance",
        "mailData": {
            "to": "styven21121@gmail.com",
            "personaDestino": "cristian esp",
            "actividad": "Visita domiciliaria",
        }
    },
    analistaEspToCliente: {
        "mailTo": "analistaEspToCliente",
        "mailData": {
            "to": "styven21121@gmail.com",
            "personaDestino": "cristian cliente",
            "centroCostoId": "001",
            "actividad": "Visita domiciliaria",
        }
    },
    directorOperacionesToCliente: {
        "mailTo": "directorOperacionesToCliente",
        "mailData": {
            "to": "styven21121@gmail.com",
            "centroCostoId": "001"
        }
    },
    directorOperacionesToFacturacion: {
        "mailTo": "directorOperacionesToFacturacion",
        "mailData": {
            "to": "styven21121@gmail.com",
            "centroCostoId": "001",
            "cliente": "Cristian cliente",
            "contacto": "",
            "numeroContacto": 1234323,
            "nombreEvaluado": "cristian stiven puenguenan",
            "actividades": [
                {
                    "nombreActividad": "visita domiciliaria",
                    "fechaCreacion": "8/10/2019",
                    "fechaCulminada": "10/1/2019"

                },
                {
                    "nombreActividad": "visita segurida",
                    "fechaCreacion": "8/10/2019",
                    "fechaCulminada": "10/1/2019"

                }
            ]
        }
    }

};

/**
 * verificacionDocumental
 * estadoSalubridad
 * nucleoFamiliar
 * entornoHabitacional
 * modusVivendi
 */
const visitaDomiciliaria = {
    "isDocumento": false,
    "isLibretaMilitar": false,
    "isLicenciaConduccion": false,
    "isTarjetaProfecional": false,
    "isDiplomaBachiller": false,
    "isDiplomaTecnico": false,
    "isDiplomaTecnologico": false,
    "isDiplomaPregrado": false,
    "isDiplomaPostgrado": false,
    "isDiplomaCursos": false,
    "observaciones": "zxczxczc"

}


const estadoSalubridad = {

    "servicioEspId": 1,
    "resource": "estadoSalubridad",
    "tomaMedicamentos": "No",
    "sufreEnfermedad": "No",
    "tratamientoPsicologico": "No",
    "fuma": false,
    "consumeAlcohol": false,
    "consumeDrogas": false,
    "realizaDeporte": "Si",
    "hobbies": "asdasdsa"


}


const nucleoFamiliar = {
    "nombre": "asdasd",
    "edad": 12,
    "identificacion": 1231231,
    "lugarExpedicion": "dsasdasd",
    "fechaNacimiento": "2019-01-24",
    "lugarNacimiento": "b",
    "ocupacion": "dasd",
    "empresa": "asdasd",
    "telefono": "123123123",
    "tiempoLaborado": "asdasd",
    "fotografia": "",
    "observaciones": "bogota",
    "hijos": [
        {
            "edad": 12,
            "nombre": "sadasd",
            "ocupacion": "asdasd",
            "ubicacion": "SDASD"
        }
    ],
    "informacionFamiliar": [
        {
            "nombre": "ASDAS",
            "parentesco": "ASDASD",
            "edad": 12,
            "ocupacion": "ASDASD",
            "telefono": 23454,
            "ciudad": "ASDASD",
            "viveConUd": false
        }
    ],
    "referencias": [
        {
            "nombre": "ASDAD",
            "ocupacion": "ASDAS",
            "telefono": 1231,
            "ciudad": "SDASD",
            "confirmacion": "ADASD"
        }
    ]
}

const entornoHabitacional = {
    "tipoVivienda": "Casa",
    "tenencia": "Arriendo",
    "tiempoPermanencia": 1,
    "infoPropietario": "asd",
    "fotografia": "C:\\fakepath\\key",
    "estadoGeneral": "Bueno",
    "acabados": "Completos",
    "dotacion": "asd",
    "salubridad": "as",
    "estrato": "2",
    "serviciosPublicos": "sas",
    "distribucion": "as",
    "ciudad": "ASDASDa",
    "barrio": "sad",
    "localidad": "asd",
    "viasAcceso": "asd",
    "transportePublico": "asd",
    "centrosAsistenciales": "asd",
    "flujoVehicular": "asd",
    "nivelSeguridad": "Alto"
}


const modusVivendi = {
    "servicioEspId": 1,
    "resource": "modusVivendi",
    "salario": 1231,
    "otrosIngresos": 123213,
    "salarioConyugue": 123123,
    "engresosMensuales": 123213,
    "descripcionGastos": "123123",
    "personasDependientes": 123123,
    "bienesInmuebles": [
        {
            "tipo": "123",
            "direccion": "123",
            "telefono": 123,
            "ciudad": "123",
            "avaluo": "123",
            "hipoteca": true
        }
    ],
    "bienesMuebles": [
        {
            "clase": "asd",
            "modelo": "asdsa",
            "placa": "asd",
            "avaluo": 21323,
            "pignorado": false
        },
        {
            "clase": "asd",
            "modelo": "asdsa",
            "placa": "asd",
            "avaluo": 21323,
            "pignorado": false
        },
        {
            "clase": "asd",
            "modelo": "asdsa",
            "placa": "asd",
            "avaluo": 21323,
            "pignorado": false
        }
    ],
    "referenciasBancarias": [
        {
            "entidad": "123123",
            "tipoCuenta": "123123"
        }
    ],
    "capacidadEndeudamieno": [
        {
            "descripcion": "credito hipotecario",
            "entidad": "123123",
            "monto": 123123,
            "estadoDeuda": "123123",
            "valorMensual": 1231220
        }
    ],
    "analisisPatrimonial": "123123123"
};


const verificacionAcademica =
    {
        "nivel": "1",
        "institucion": "colegio",
        "titulo": "bachiller",
        "anno": "2016",
        "ciudad": "bogota",
        "confirmacion": true,
        "observacion": "asdsd"
    };

const verificacionLaboral =
    {
        "empresa"           : "test",
        "cargo"             : "test",
        "telefono"          : 3224441232,
        "periodo"           : "test",
        "jefeInmediato"    : "test",
        "cargoJefe"        : "test",
        "ciudad"            : "test",
        "motivoRetiro"     : "test",
        "confirmacion"      : true,
        "observaciones"     : "test"
    };


const evaluacionFinanciera = {
    'conclusion' : "test",
    "cuentaBancaria": {
        "tipoCuenta" : "test",
        "entidad" : "test",
        "ciudad" : "bogota",
        "fechaApertura" : "test",
        "estado" : "test",
    },
    "obligacionExtinguida" : {
        "entidad": "test",
        "fechaApertura": "2019-01-31",
        "fechaCierre": "2019-01-31",
        "tipoCredito": "test",
        "valor": 12321,
    },
    "obligacionMora" : {
        "entidad" : "test",
        "tipoCredito" : "test",
        "tiempoMora" : "test",
        "montoMora" : "test",
    },
    "obligacion-mora" : {
        "entidad"       : "test",
        "tipoCredito"   : "test",
        "valorAprobado" : 120300.2,
        "saldoActual"   : 120300.2,
        "valorCuota"    : 120300.2322
    },
    "obligacionVigenteReal" : {
        "entidad"         : "test",
        "lineaCredito"    : "test",
        "fechaApertura"   : "2019-01-31",
        "valorCargoFijo"  : 1998.10
    }
}

const consolidado =
    {
        "antecedentes" : false,
        "antecedentesObservacion" : "test",
        "poligrafia" : false,
        "poligrafiaObservacion" : "test",
        "financiero" : false,
        "financieroObservacion" : "test",
        "licenciaConduccion" : false,
        "cat" : 123212,
        "vigencia" : "2018-09-10",
        "comparendos" : false,
        "historial" : "test",
        "firma" : "test",
        "conclusion" : true,
        "observacion" : "test"
    }



const datosInforme =
    {
        "encabezado": true,
        "fotoEvaluado": true,
        "logoCliente": true,
        "nucleoFamiliar": true,
        "verficacionVa": true,
        "verficacionVl": true,
        "referenciasBancarias": true,
        "capacidadEndeudamiento": true,
        "estudioFinanciero": true,
        "historialJudicial": true,
        "evaluacionSeguridad": true,
    }
