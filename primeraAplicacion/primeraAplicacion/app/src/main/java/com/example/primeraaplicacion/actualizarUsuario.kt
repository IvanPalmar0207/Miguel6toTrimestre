package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.JsonArrayRequest
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley

class actualizarUsuario : AppCompatActivity() {

    var cajaActualizarNombre_usu:EditText?=null
    var cajaActualizarApellidos_usu:EditText?=null
    var cajaActualizarCodigotpd:EditText?=null
    var cajaActualizaCorreoElectronico_usu:EditText?=null
    var cajaActualizarCodigorl:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_actualizar_usuario)

        cajaActualizarNombre_usu = findViewById(R.id.cajaActualizarNombre_usu)
        cajaActualizarApellidos_usu = findViewById(R.id.cajaActualizarApellidos_usu)
        cajaActualizarCodigotpd = findViewById(R.id.cajaActualizarCodigotpd)
        cajaActualizaCorreoElectronico_usu = findViewById(R.id.cajaActualizaCorreoElectronico_usu)
        cajaActualizarCodigorl = findViewById(R.id.cajaActualizarCodigorl)
        val btnActualizarDatosUSU = findViewById<Button>(R.id.btnActualizarDatosUSU)
        val btnVolverActualizarUSU = findViewById<TextView>(R.id.btnVolverActualizarUSU)

        val numeroDocumento_usu = intent.getStringExtra("numeroDocumento_usu").toString()

        val queue = Volley.newRequestQueue(this)
        val url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/usuarios/seleccionarUsuarios.php?numeroDocumento_usu=$numeroDocumento_usu"
        val jsonObjectRequest= JsonObjectRequest(
            Request.Method.GET,url,null,
            { response ->
                cajaActualizarNombre_usu?.setText(response.getString("nombres_usu"))
                cajaActualizarApellidos_usu?.setText(response.getString("apellidos_usu"))
                cajaActualizarCodigotpd?.setText(response.getString("codigo_tpD"))
                cajaActualizaCorreoElectronico_usu?.setText(response.getString("correoElectronico_usu"))
                cajaActualizarCodigorl?.setText(response.getString("codigo_rl"))

            }, { error ->
                Toast.makeText(this, "No se pudo encontrar ningun usuario con ese numero de documento", Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext,solicitarActualizar::class.java)
                startActivity(intent)
            }
        )
        queue.add(jsonObjectRequest)

        btnVolverActualizarUSU.setOnClickListener {
            val intent = Intent(applicationContext,solicitarActualizar::class.java)
            startActivity(intent)
        }

        btnActualizarDatosUSU.setOnClickListener {
            actualizarDatos()
        }
    }
    private fun actualizarDatos(){

        val numeroDocumento_usu = intent.getStringExtra("numeroDocumento_usu").toString()
        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/usuarios/actualizarUsuarios.php?numeroDocumento_usu=$numeroDocumento_usu"
        var queue=Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"El usuario ha sido actualizado correctamente",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, GestionUsuarios::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al actualizar el usuario, intenta nuevamente", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("nombres_usu", cajaActualizarNombre_usu?.text.toString());
                parametros.put("apellidos_usu", cajaActualizarApellidos_usu?.text.toString());
                parametros.put("correoElectronico_usu",cajaActualizaCorreoElectronico_usu?.text.toString());
                parametros.put("codigo_rl",cajaActualizarCodigorl?.text.toString());
                parametros.put("codigo_tpD",cajaActualizarCodigotpd?.text.toString())
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }

}