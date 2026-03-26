import { useEffect, useState } from 'react'
import {
  getNiveles,
  getCategorias,
  getMaterias,
  getTemas,
  createTema
} from '../services/api'

export default function Temas() {
  const [niveles, setNiveles] = useState([])
  const [categorias, setCategorias] = useState([])
  const [materias, setMaterias] = useState([])
  const [temas, setTemas] = useState([])

  const [form, setForm] = useState({
    nombre: '',
    descripcion: '',
    materia_id: '',
    nivel_id: '',
    categoria_id: ''
  })

  useEffect(() => {
    Promise.all([getNiveles(), getCategorias(), getMaterias(), getTemas()])
      .then(([n, c, m, t]) => {
        setNiveles(n.data)
        setCategorias(c.data)
        setMaterias(m.data)
        setTemas(t.data)
      })
  }, [])

  const handleChange = e => {
    setForm({ ...form, [e.target.name]: e.target.value })
  }

  const handleSubmit = async e => {
    e.preventDefault()

    await createTema({
      nombre: form.nombre,
      descripcion: form.descripcion,
      FK_Materia: form.materia_id,
      FK_Nivel: form.nivel_id,
      FK_Categoria: form.categoria_id
    })

    alert('Tema agregado')

    const res = await getTemas()
    setTemas(res.data)

    setForm({
      nombre: '',
      descripcion: '',
      materia_id: '',
      nivel_id: '',
      categoria_id: ''
    })
  }

  const handleVer = (tema) => {
    alert("Ver tema: " + tema.tema)
  }

  const handleEditar = (tema) => {
    alert("Editar tema: " + tema.tema)
  }


  return (

    <div>

      {/* NAVBAR */}
      <header className="navbar">
        <div className="logo">NumerIQ</div>

        <div className="nav-links">
          <span>Mis Tutorías</span>
          <span>Perfil</span>
        </div>
      </header>


      {/* CONTENEDOR CENTRAL */}
      <main className="page-center"
        style={{
          display: 'flex',
          justifyContent: 'center',
          marginTop: '30px'
        }}
      >

        {/* DIV CENTRAL */}
        <div className="page-content"
          style={{
            width: '100%',
            maxWidth: '900px'
          }}
        >

          {/* FORM */}
          <section className="card">

            <h2>Agregar Tema</h2>

            <form onSubmit={handleSubmit} className="form-grid">

              <input
                name="nombre"
                placeholder="Nombre del tema"
                value={form.nombre}
                onChange={handleChange}
                required
              />

              <select
                name="nivel_id"
                value={form.nivel_id}
                onChange={handleChange}
                required
              >
                <option value="">Nivel</option>

                {niveles.map(n => (
                  <option
                    key={n.PK_Nivel}
                    value={n.PK_Nivel}
                  >
                    {n.nivel}
                  </option>
                ))}
              </select>


              <select
                name="categoria_id"
                value={form.categoria_id}
                onChange={handleChange}
                required
              >
                <option value="">Categoría</option>

                {categorias.map(c => (
                  <option
                    key={c.PK_Categoria}
                    value={c.PK_Categoria}
                  >
                    {c.categoria}
                  </option>
                ))}
              </select>


              <select
                name="materia_id"
                value={form.materia_id}
                onChange={handleChange}
                required
              >
                <option value="">Materia</option>

                {materias.map(m => (
                  <option
                    key={m.PK_Materia}
                    value={m.PK_Materia}
                  >
                    {m.materia}
                  </option>
                ))}
              </select>


              <textarea
                name="descripcion"
                placeholder="Descripción"
                value={form.descripcion}
                onChange={handleChange}
              />

              <button>
                Guardar Tema
              </button>

            </form>

          </section>



          {/* CARDS */}
          <section className="card">

            <h2>Lista de Temas</h2>

            <div className="cards-grid">
              {temas.map(t => (
                <div key={t.PK_Tema} className="tema-card">
                
                  <h3 className="tema-nombre">{t.tema}</h3>
                  <p className="tema-materia">
                    {t.materias?.[0]?.materia || "Sin materia"}
                  </p>
              
                  <div className="tema-actions">
                    <button
                      className="btn-ver"
                      onClick={() => handleVer(t)}
                    >
                      Ver
                    </button>
              
                    <button
                      className="btn-editar"
                      onClick={() => handleEditar(t)}
                    >
                      Editar
                    </button>
                  </div>
              
                </div>
              ))}
            </div>


          </section>


        </div>

      </main>

    </div>
  )
}
