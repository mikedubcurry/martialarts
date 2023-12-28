import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function GymsIndex({ gyms, user }) {

    return (
        <AuthenticatedLayout user={user}>
            <h2 className='text-2xl font-bold'>Gyms</h2>
            <form action='/gyms/search' method='GET' className='flex gap-4 items-center mb-4'>
                <input type='text' name='discipline' placeholder='Muay Thai, Sambo' className='border border-gray-300 rounded-lg p-2' />
                <button type='submit' className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Search</button>
            </form>
            <div className=''>
                <ul className='list-inside'>
                    {gyms.map((gym) => (
                        <li className='flex justify-between items-center border-b py-2 hover:bg-gray-50' key={gym.id}>
                            <div className='w-full flex justify-between items-center gap-4'>
                                <p>{gym.name}</p>
                                <ul className='flex flex-col gap-2'>
                                    {gym.disciplines.map((discipline) => (
                                        <li key={discipline.id}>{discipline.discipline}</li>
                                    ))}
                                </ul>
                                <a href={"/gyms/" + gym.slug} className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>View</a>
                            </div>
                        </li>
                    ))}
                </ul>
            </div>
        </AuthenticatedLayout>
    )
}
