import Authenticated from '@/Layouts/AuthenticatedLayout'
import React from 'react'
import { Link, useForm, usePage } from '@inertiajs/react';
import CreateSessionForm from './Partials/CreateSessionForm';

export default function Create({disciplines, gyms}) {
    const user = usePage().props.auth.user;

    return (
        <Authenticated>
            <h1 className='text-center text-2xl font-bold'>Record New Session</h1>
            <CreateSessionForm disciplines={disciplines} gyms={gyms}/>
        </Authenticated>
    )
}
