import { BrowserRouter, Route, Routes } from "react-router-dom";
import MainLayout from "./layout/MainLayout";
import Home from "./pages/Home";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<MainLayout/>}>
          <Route path="" element={<Home/>}/>
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
