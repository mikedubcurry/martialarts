import Authenticated from "@/Layouts/AuthenticatedLayout"
import { usePage, useForm } from "@inertiajs/react"
import { useEffect } from "react"

export default function Create({ disciplines }) {
    const { user } = usePage().props
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        address: '',
        city: '',
        state: '',
        zip: '',
        phone: '',
        disciplines: [],
        slug: '',
    })

    const submit = (e) => {
        e.preventDefault()
        post('/gyms', {
            onSuccess: () => {
                reset()
            }
        })
    }
    const handleDisciplineChange = (e) => {
        //(e) => setData('disciplines', e.target.value)
        console.log(e.target.value)
        console.log(data.disciplines)

        let disciplines = data.disciplines
        disciplines.push(e.target.value)
        setData('disciplines', disciplines)

    }

    useEffect(() => {
        let slug = data.name.toLowerCase().split(' ').filter(q => q).join('-').replace(/[^\w-]+/g, '')
        setData('slug', slug)
    }, [data.name])

    return (
        <Authenticated user={user}>
            <h2 className='text-2xl font-bold'>Add a New Gym</h2>
            <form onSubmit={submit} className='flex flex-col gap-4'>
                <label htmlFor='name'>
                    <span className="text-gray-700">Name</span>
                    <input type='text' name='name' value={data.name} onChange={(e) => setData('name', e.target.value)} className='border border-gray-300 rounded-lg p-2' />
                </label>
                <label htmlFor='slug'>
                    <span className="text-gray-700">URL (martialarts.com/gyms/gym-name)</span>
                    <input type='text' name='slug' value={data.slug} disabled className='border border-gray-300 rounded-lg p-2' />
                </label>
                <label htmlFor='address'>
                    <span className="text-gray-700">Address</span>
                    <input type='text' name='address' value={data.address} onChange={(e) => setData('address', e.target.value)} className='border border-gray-300 rounded-lg p-2' />
                </label>
                <label htmlFor='city'>
                    <span className="text-gray-700">City</span>
                    <input type='text' name='city' value={data.city} onChange={(e) => setData('city', e.target.value)} className='border border-gray-300 rounded-lg p-2' />
                </label>
                <label htmlFor='state'>
                    <span className="text-gray-700">State</span>
                    <input type='text' name='state' value={data.state} onChange={(e) => setData('state', e.target.value)} className='border border-gray-300 rounded-lg p-2' />
                </label>
                <label htmlFor='zip'>
                    <span className="text-gray-700">Zip</span>
                    <input type='text' name='zip' value={data.zip} onChange={(e) => setData('zip', e.target.value)} className='border border-gray-300 rounded-lg p-2' />
                </label>
                <label htmlFor='phone'>
                    <span className="text-gray-700">Phone</span>
                    <input type='text' name='phone' value={data.phone} onChange={(e) => setData('phone', e.target.value)} className='border border-gray-300 rounded-lg p-2' />
                </label>
                <label htmlFor='disciplines'>
                    <span className="text-gray-700">Disciplines</span>
                    <select name='disciplines' onChange={handleDisciplineChange} className='border border-gray-300 rounded-lg p-2'>
                        {disciplines.map((discipline) => (
                            <option key={discipline.id} value={discipline.id}>{discipline.discipline}</option>
                        ))}
                    </select>
                </label>
                <button type='submit' className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded' disabled={processing}>Add Gym</button>
            </form>
        </Authenticated>
    )
}
