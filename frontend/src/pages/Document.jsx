import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { getDocument } from '../api/routes/document';
import { FaFilePdf, FaFileWord, FaFileExcel, FaFilePowerpoint, FaFile } from 'react-icons/fa6';
import { IoApps, IoList } from 'react-icons/io5';
import { ContextMenuTrigger, ContextMenu, ContextMenuItem, ContextMenuContent, ContextMenuShortcut } from '../ui/ui/context-menu';
import { LuFileEdit, LuShare2, LuTrash2 } from 'react-icons/lu';

function Document() {
    const [documents, setDocuments] = useState([]);
    const [view, setView] = useState('grid');

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

    return (
        <div className='w-full'>
            <div className="breadcrumbs text-sm">
                <ul>
                    <li><Link to="/">Sige Archive</Link></li>
                    <li>Documents</li>
                </ul>
            </div>
            <div className='flex items-end justify-end'>
                <div>
                    <button onClick={() => setView('grid')} className={view === "grid" ? 'btn btn-sm btn-ghost bg-amber-500/50' : 'btn btn-sm btn-ghost'}>
                        <IoApps />
                    </button>
                    <button onClick={() => setView('list')} className={view === "list" ? 'btn btn-sm btn-ghost bg-amber-500/50' : 'btn btn-sm btn-ghost'}>
                        <IoList />
                    </button>
                </div>
            </div>
            {
                view === 'grid' && (
                    <div className="grid grid-cols-8 gap-5 py-8">
                        {documents.map((doc, k) => (
                            <ContextMenu>
                                <ContextMenuTrigger>

                                    <div key={k} className="flex flex-col items-center" title={`${doc.titre}.${doc.file_path.split('.').pop()}`}>
                                        <div className="text-6xl">
                                            {getFileIcon(doc.file_path)}
                                        </div>
                                        <div className="text-center" title={`${doc.titre}.${doc.file_path.split('.').pop()}`}>
                                            {`${doc.titre.substring(0, 10)}(...).${doc.file_path.split('.').pop()}`}
                                        </div>
                                    </div>


                                </ContextMenuTrigger>
                                <ContextMenuContent className="w-64">
                                    <ContextMenuItem inset>
                                        Partager le document
                                        <ContextMenuShortcut><LuShare2 /></ContextMenuShortcut>
                                    </ContextMenuItem>
                                    <ContextMenuItem inset>
                                        Renommer le document
                                        <ContextMenuShortcut><LuFileEdit /></ContextMenuShortcut>
                                    </ContextMenuItem>
                                    <ContextMenuItem inset>
                                        <div className="text-red-500">
                                            Supprimer le document
                                        </div>
                                        <ContextMenuShortcut><LuTrash2 /></ContextMenuShortcut>
                                    </ContextMenuItem>
                                </ContextMenuContent>
                            </ContextMenu>
                        ))}
                    </div>
                )
            }
            {
                view === 'list' && (
                    <div className="overflow-x-auto">
                        <table className="table">
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
                                {documents.map((doc, k) => (
                                    <tr key={k}>
                                        <th>
                                            <ContextMenu>
                                                <ContextMenuTrigger>

                                                    <div className='text-xl'>
                                                        {getFileIcon(doc.file_path)}
                                                    </div>


                                                </ContextMenuTrigger>
                                                <ContextMenuContent className="w-64">
                                                    <ContextMenuItem inset>
                                                        Partager le document
                                                        <ContextMenuShortcut><LuShare2 /></ContextMenuShortcut>
                                                    </ContextMenuItem>
                                                    <ContextMenuItem inset>
                                                        Renommer le document
                                                        <ContextMenuShortcut><LuFileEdit /></ContextMenuShortcut>
                                                    </ContextMenuItem>
                                                    <ContextMenuItem inset>
                                                        <div className="text-red-500">
                                                            Supprimer le document
                                                        </div>
                                                        <ContextMenuShortcut><LuTrash2 /></ContextMenuShortcut>
                                                    </ContextMenuItem>
                                                </ContextMenuContent>
                                            </ContextMenu>
                                        </th>
                                        <td>
                                            <ContextMenu>
                                                <ContextMenuTrigger>
                                                    {`${doc.titre}.${doc.file_path.split('.').pop()}`}

                                                </ContextMenuTrigger>
                                                <ContextMenuContent className="w-64">
                                                    <ContextMenuItem inset>
                                                        Partager le document
                                                        <ContextMenuShortcut><LuShare2 /></ContextMenuShortcut>
                                                    </ContextMenuItem>
                                                    <ContextMenuItem inset>
                                                        Renommer le document
                                                        <ContextMenuShortcut><LuFileEdit /></ContextMenuShortcut>
                                                    </ContextMenuItem>
                                                    <ContextMenuItem inset>
                                                        <div className="text-red-500">
                                                            Supprimer le document
                                                        </div>
                                                        <ContextMenuShortcut><LuTrash2 /></ContextMenuShortcut>
                                                    </ContextMenuItem>
                                                </ContextMenuContent>
                                            </ContextMenu>
                                        </td>
                                        <td>{doc?.taille > 1024 * 1024 ? `${(doc.taille / (1024 * 1024)).toFixed(2)} Mo` : `${(doc.taille / 1024).toFixed(2)} Ko`}</td>
                                        <td>{doc?.file_create_date}</td>
                                        <td>
                                            {new Date(doc?.created_at).getDate().toString().padStart(2, '0')}/{new Date(doc?.created_at).getMonth().toString().padStart(2, '0')}/{new Date(doc?.created_at).getFullYear()} - {new Date(doc?.created_at).getUTCHours()}:{new Date(doc?.created_at).getMinutes()}
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

export default Document;
