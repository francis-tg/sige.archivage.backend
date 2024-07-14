import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom'
import { Link } from 'react-router-dom';
import { FaFilePdf, FaFileWord, FaFileExcel, FaFilePowerpoint, FaFile } from 'react-icons/fa6';
import { IoApps, IoList } from 'react-icons/io5';
import { getCategorieById } from '../api/routes/categorie';
function OpenFolder() {
    const {id} = useParams()
    const [documents, setDocuments] = useState([]);
    const [categorie, setCategorie] = useState({});
    const [view,setView] = useState('grid')
    const fetchDocuments = () => {
        getCategorieById(id)
            .then(async (res) => {
                if (res.status === 200) {
                    const {documents,dossier} = await res.json();
                    setDocuments(documents);
                    setCategorie(dossier)
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
        <div className='w-full'>
            <div className="breadcrumbs text-sm">
                <ul>
                    <li><Link to="/">Sige Archive</Link></li>
                    <li ><span className='text-primary'>{categorie?.label}</span></li>
                </ul>
            </div>
            <div className='flex items-end justify-end'>
                <div>
                    <button onClick={function(){setView('grid')}} className={view==="grid"?'btn btn-sm btn-ghost bg-amber-500/50':'btn btn-sm btn-ghost'}>
                    <IoApps/>
                    </button>
                    <button onClick={function(){setView('list')}} className={view==="list"?'btn btn-sm btn-ghost bg-amber-500/50':'btn btn-sm btn-ghost'}>
                    <IoList/>
                    </button>
                </div>
            </div>
            {
                view ==='grid'&&(
                    <div className="grid grid-cols-8 gap-5 py-8">
                {documents.map((doc, k) => (
                    <div key={k} className="flex flex-col items-center" title={String(doc.titre)+'.'+doc.file_path.split('.').pop()}>
                        <div className="text-6xl">
                            {getFileIcon(doc.file_path)}
                        </div>
                        <div className="text-center" title={String(doc.titre)+'.'+doc.file_path.split('.').pop()}>
                            {String(doc.titre).substring(0,10)+'(...)'}.{doc.file_path.split('.').pop()}
                        </div>
                    </div>
                ))}
            </div>
                )
            
            }
            {
                view ==='list'&&(
                    <div className="overflow-x-auto">
                <table className="table">
                    {/* head */}
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nom du fichier</th>
                            <th>Taille du fichier</th>
                            <th>Date de création du fichier</th>
                            <th>Date d'archivage</th>
                        </tr>
                    </thead>
                    <tbody>
                        {/* row 1 */}
                        
                        {documents.map((doc, k) => (
                            <tr key={k}>
                            <th>
                                <div className='text-xl'>
                                {getFileIcon(doc.file_path)}
                                </div>
                            </th>
                            <td>{doc.titre}.{doc.file_path.split('.').pop()}</td>
                            <td>{doc?.taille > 1024 * 1024 ? (doc?.taille / (1024 * 1024)).toFixed(2) + ' Mo' : (doc?.taille / 1024).toFixed(2) + ' Ko'}</td>
                            <td>
                                {doc?.file_create_date}
                            </td>
                            <td>
                            {new Date(doc?.created_at).getDate().toString().padStart(2,'0')}/{new Date(doc?.created_at).getMonth().toString().padStart(2,'0')}/{new Date(doc?.created_at).getFullYear()} - {new Date(doc?.created_at).getUTCHours()}:{new Date(doc?.created_at).getMinutes()}
                            </td>
                        </tr>
                    
                ))}
                        
                    </tbody>
                </table>
            </div>
                )
            }
        </div>
    );
}

export default OpenFolder