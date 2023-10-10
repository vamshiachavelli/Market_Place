import { Route, BrowserRouter, Routes } from 'react-router-dom';
import Layout from './components/Layout';
import Home from './components/Home';
import About from './components/About';
import Contact from './components/Contact';
import StudentPanel from './components/student-panel';
import SchoolAdmin from './components/school-admin';
import BusinessOwner from './components/Business-owner';
import SuperAdmin from './components/super-admin';
import Register from './components/register';

function App() {
  return (
    <BrowserRouter>
    <Routes>
      <Route path="/" element={<Layout />}>
         <Route index element={<Home />} />
         <Route path="about" element={<About />} />
         <Route path="contact" element={<Contact />} />
         <Route path="register" element={<Register />} />
         <Route path="student" element={<StudentPanel /> } />
         <Route path="school" element={ <SchoolAdmin /> } />
         <Route path="business" element={ <BusinessOwner /> } />
         <Route path="super-admin" element={ <SuperAdmin /> } />
      </Route>
    </Routes>
  </BrowserRouter>
  );
}

export default App;
