import { useState } from "react"
import { useNavigate } from "react-router-dom"

export default function Home(){

 const [mensaje,setMensaje] = useState("")
 const navigate = useNavigate()

 const enviarSolicitud = async () => {

  try{

    const res = await fetch("http://localhost:8000/api/solicitud")

    if(res.status === 429){
        setMensaje("Demasiadas solicitudes. Intenta nuevamente en un momento.")
        return
    }

    const data = await res.json()

    setMensaje(data.mensaje)

  }catch(error){
    setMensaje("Error al conectar con el servidor")
  }

 }

 return(

  <div>

   <h2>Prueba de Rate Limiting</h2>

   <button onClick={enviarSolicitud}>
      Enviar solicitud
   </button>

   {/* 🔥 BOTÓN NUEVO */}
   <button onClick={() => navigate("/Temas")}>
      Crear tema
   </button>

   <p>{mensaje}</p>

  </div>

 )

}