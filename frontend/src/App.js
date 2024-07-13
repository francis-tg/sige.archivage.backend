import { BrowserRouter, Route, Routes } from "react-router-dom";
import MainLayout from "./layout/MainLayout";
import Home from "./pages/Home";
import Login from "./pages/Login";
import PrivateRoute from "./components/PrivateRoute";
import 'react-toastify/dist/ReactToastify.css';
import { ToastContainer } from 'react-toastify';
import Personnel from "./pages/Personnel";
import Document from "./pages/Document";
function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<MainLayout />}>
          <Route path="" element={<PrivateRoute />}>
            <Route path="" element={<Home />} />
          </Route>
          <Route path="personnel" element={<PrivateRoute />}>
            <Route path="personnel" element={<Personnel/>} />
          </Route>
          <Route path="doc" element={<PrivateRoute />}>
            <Route path="doc" element={<Document/>} />
          </Route>
        </Route>
        <Route path="/login" element={<Login />} />
      </Routes>
      <ToastContainer />
    </BrowserRouter>
  );
}

export default App;
