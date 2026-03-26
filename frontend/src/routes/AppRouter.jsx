import { BrowserRouter, Routes, Route } from 'react-router-dom'
import CreateTema from '../pages/CreateTema'
import TablaTemas from '../pages/TablaTemas'
import Home from '../pages/home'

export default function AppRouter() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/Temas" element={<CreateTema />} />
      </Routes>
    </BrowserRouter>
  )
}
