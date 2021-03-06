import { mount, shallowMount, flushPromises } from "@vue/test-utils";
import BookShow from "../../../components/books/BookShow.vue";
import router from "../../../router";
import axios from 'axios';

jest.mock('axios');
const mockedAxios = axios as jest.Mocked<typeof axios>;

const testId = '3';
const fakeBook = { "id": "3", "title": "book1", "subtitle": "hello1", "year": 1938}
const fakeData = Promise.resolve({"data": fakeBook});


describe("BookShow.vue", () => {

    beforeEach(() => {
    })

  it("correctly mounts with correct data", async () => {

    mockedAxios.get.mockReturnValueOnce(fakeData);

    const wrapper = shallowMount(BookShow, {
    propsData: {
        id: testId
    },
      global: {
        plugins: [router],
      }
    } as any);

    expect(axios.get).toBeCalledWith("/api/books/"+testId);

    await flushPromises();
    expect(wrapper.vm.book.id).toBe(testId);
  });

  // Add more tests
});
