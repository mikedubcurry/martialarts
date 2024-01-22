import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useEffect } from 'react';

export default function GymsIndex({ gyms, user }) {

    useEffect(() => {
        const url = new URL(window.location.href);
        const search = url.searchParams.get('discipline');
        document.getElementById('search').value = search;
    }, [])

    return (
        <AuthenticatedLayout user={user}>
            <h2 className='text-2xl font-bold'>Gyms</h2>
            <form action='/gyms/search' method='GET' className='flex gap-4 items-center mb-4'>
                <input id="search" type='text' name='discipline' placeholder='Muay Thai, Sambo' className='border border-gray-300 rounded-lg p-2' />
                <button type='submit' className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Search</button>
            </form>
            <div className=''>
                <ul className='list-inside'>
                    {gyms.map((gym) => (
                        <li className='flex justify-between items-center border-b py-2 hover:bg-gray-50' key={gym.id}>
                            <div className='w-full grid grid-cols-[3fr_3fr_1fr] gap-4'>
                                <p className='flex items-center'>{gym.name}</p>
                                <p className='flex items-center'>{gym.address} {gym.city}, {gym.state}</p>
                                <a href={"/gyms/" + gym.slug} className='w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center'>View</a>
                            </div>
                        </li>
                    ))}
                </ul>
            </div>
        </AuthenticatedLayout>
    )
}
