import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { getDocument } from '../api/routes/document';
import { FaFilePdf, FaFileWord, FaFileExcel, FaFilePowerpoint, FaFile } from 'react-icons/fa6';

function Document() {
    const [documents, setDocuments] = useState([]);

    const fetchDocuments = () => {
        getDocument()
            .then(async (res) => {
                if (res.status === 200) {
                    const data = await res.json();
                    setDocuments(data);
                }
            })
            .catch((err) => console.log(err));
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

    return (
        <div>
            <div className="breadcrumbs text-sm">
                <ul>
                    <li><Link to="/">Sige Archive</Link></li>
                    <li>Documents</li>
                </ul>
            </div>
            <div className="grid grid-cols-8 gap-5 py-8">
                {documents.map((doc, k) => (
                    <div key={k} className="flex flex-col items-center">
                        <div className="text-6xl">
                            {getFileIcon(doc.file_path)}
                        </div>
                        <div className="text-center">
                            {doc.titre}.{doc.file_path.split('.').pop()}
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
}

export default Document;
