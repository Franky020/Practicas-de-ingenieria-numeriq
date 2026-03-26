import axios from 'axios'

const api = axios.create({
  baseURL: 'http://127.0.0.1:8000/api', // ajusta a tu backend
})

export const getMaterias = () => api.get('/materias')
export const getNiveles = () => api.get('/niveles')
export const getCategorias = () => api.get('/categorias')

export const getTemas = () => api.get('/temas')

export const createTema = (data) => api.post('/temas', data)

export default api
