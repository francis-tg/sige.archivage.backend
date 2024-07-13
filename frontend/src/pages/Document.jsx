import React from 'react'
import { Link } from 'react-router-dom'

function Document() {
    return (
        <div>
            <div className="breadcrumbs text-sm">
                <ul>
                    <li><Link to={"/"}>Sige Archive</Link></li>
                    <li>Documents</li>
                </ul>
            </div>
            Document
        </div>
    )
}

export default Document