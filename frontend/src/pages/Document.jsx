import React, { useEffect, useState } from 'react';
import Breadcrumbs from '../components/Breadcrumbs';
import ViewToggleButtons from '../components/ViewToggleButtons';
import DocumentGrid from '../components/DocumentGrid';
import DocumentList from '../components/DocumentList';
import Pagination from '../components/Pagination';
import { getDocument } from '../api/routes/document';
import { FaFilePdf, FaFileWord, FaFileExcel, FaFilePowerpoint, FaFile } from 'react-icons/fa6';

function Document() {
  const [documents, setDocuments] = useState([]);
  const [view, setView] = useState('grid');
  const [currentPage, setCurrentPage] = useState(1);
  const documentsPerPage = 10;

  const fetchDocuments = async () => {
    try {
      const res = await getDocument();
      if (res.status === 200) {
        const data = await res.json();
        setDocuments(data);
      }
    } catch (err) {
      console.error('Erreur lors de la récupération des documents:', err);
    }
  };

  useEffect(() => {
    fetchDocuments();
  }, []);

  const getFileIcon = (filePath) => {
    const fileExtension = filePath.split('.').pop();
    switch (fileExtension) {
      case 'pdf':
        return <FaFilePdf className="text-red-600" />;
      case 'doc':
      case 'docx':
        return <FaFileWord className="text-blue-600" />;
      case 'xls':
      case 'xlsx':
      case 'csv':
        return <FaFileExcel className="text-green-600" />;
      case 'ppt':
      case 'pptx':
        return <FaFilePowerpoint className="text-orange-600" />;
      default:
        return <FaFile />;
    }
  };

  const indexOfLastDocument = currentPage * documentsPerPage;
  const indexOfFirstDocument = indexOfLastDocument - documentsPerPage;
  const currentDocuments = documents.slice(indexOfFirstDocument, indexOfLastDocument);

  return (
    <div className='w-full'>
      <Breadcrumbs where={"Documents"} />
      <ViewToggleButtons view={view} setView={setView} />
      {view === 'grid' ? (
        <DocumentGrid documents={currentDocuments} getFileIcon={getFileIcon} />
      ) : (
        <DocumentList documents={currentDocuments} getFileIcon={getFileIcon} />
      )}
      <Pagination
        currentPage={currentPage}
        totalPages={Math.ceil(documents.length / documentsPerPage)}
        onPageChange={setCurrentPage}
      />
    </div>
  );
}

export default Document;
