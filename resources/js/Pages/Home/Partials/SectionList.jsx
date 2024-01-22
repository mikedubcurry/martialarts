export default function SectionList({ title, keys, data, setSelectedItem }) {
    console.log(data)
    return (
        <div className='mt-4'>
            <h2 className='text-2xl font-bold'>{title}</h2>
            <div className=''>
                <ul className=''>
                    {data.map((item) => (
                        <li className='w-full border-b py-2 hover:bg-gray-50' key={item.id} onClick={() => setSelectedItem(item)}>
                            <div className='grid grid-cols-4 gap-4'>
                                {keys.map((key) => (
                                    <p key={key}>{item[key]}</p>
                                ))}
                            </div>
                        </li>
                    ))}
                </ul>
            </div>
        </div>

    )
}
