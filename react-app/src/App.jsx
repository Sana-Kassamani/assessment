import { BrowserRouter, Route, Routes } from "react-router-dom";
import "./App.css";
import Projects from "./pages/Projects";
import ProjectProvider from "./context/ProjectContext";

const App = () => {
  return (
    <div className="App">
      <BrowserRouter>
        <ProjectProvider>
          <Routes>
            <Route path="/" element={<Projects />} />
          </Routes>
        </ProjectProvider>
      </BrowserRouter>
    </div>
  );
};

export default App;
