import React from "react";
import "@mantine/core/styles.css";
import "./App.css";
import Login from "./routes/Login";
import Admin from "./routes/Admin";
import { useNavigate, BrowserRouter, Routes, Route } from "react-router-dom";
import { MantineProvider } from "@mantine/core";

function App() {
  return (
    <MantineProvider>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Login />} />
          <Route path="/admin" element={<Admin />} />
        </Routes>
      </BrowserRouter>
    </MantineProvider>
  );
}

export default App;
