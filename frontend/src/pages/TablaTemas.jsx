import { useEffect, useState } from 'react'
import { getTemas } from '../services/api'

export default function TablaTemas() {
  const [temas, setTemas] = useState([])

  useEffect(() => {
    getTemas().then(r => setTemas(r.data))
  }, [])

  return (
    <div>
      <h2>Lista de Temas</h2>

      <table border="1" cellPadding="8">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tema</th>
            <th>Materia</th>
            <th>Nivel</th>
            <th>Categoría</th>
            <th>Descripción</th>
          </tr>
        </thead>

        <tbody>
          {temas.map(t => (
            <tr key={t.PK_Tema}>
              <td>{t.PK_Tema}</td>
              <td>{t.tema}</td>
              <td>{t.materias?.[0]?.materia}</td>
              <td>{t.materias?.[0]?.nivel?.nivel}</td>
              <td>{t.materias?.[0]?.categoria?.categoria}</td>
              <td>{t.descripcion}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  )
}