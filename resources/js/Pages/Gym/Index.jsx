import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function GymsIndex({ gyms, user }) {
    console.log(gyms)
    return (
        <AuthenticatedLayout user={user}>
            <h2 className='text-2xl font-bold'>Gyms</h2>
            <form action='/gyms/search' method='GET' className='flex gap-4 items-center'>
                <input type='text' name='query' placeholder='Muay Thai, Sambo' className='border border-gray-300 rounded-lg p-2' />
                <button type='submit' className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Search</button>
            </form>
        </AuthenticatedLayout>
    )
}
